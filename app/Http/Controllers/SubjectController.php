<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Career;
use App\Models\Cargo;
use App\Models\College;
use App\Models\CoordinadorCarrera;
use App\Models\CoordinadorDepto;
use App\Models\CoordinadorMateria;
use App\Models\Persona;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        DB::beginTransaction();
        try {

            $materia = Subject::create($request->validated());
            $materia->abrev_name = $request->abrev_name;
            $materia->usuario_alta = Auth()->user()->id;
            $materia->type = $request->type;
            $materia->save();

            $careers = $request->input('career_id');
            $materia->carreras()->sync($careers);
            if ($request->has('coordinador_id')) {

                foreach ($request->input('coordinador_id') as $item) {
                    $coordmateria = new CoordinadorMateria();
                    $coordmateria->coordinador_id = $item;
                    $coordmateria->materia_id = $materia->id;
                    $coordmateria->save();
                }
            }
            DB::commit();
            return redirect('/materias')->with('success', "Materia registrada correctamente.");
        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {

        $careers = Career::all()->where('deleted_at', null);
        $colleges = College::all()->where('deleted_at', null);
        $coords = Persona::with("roles")->whereHas("roles", function ($q) {
            $q->whereIn("name", ['coordinador']);
        })->where('deleted_at', null)->get();


        return view('auth.subject.register', ['careers' => $careers, 'colleges' => $colleges, 'coords' => $coords]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        if ($request->validated()) {

            $subject = Subject::find($request->input('subject_id'));
            $subject->name = $request->input('name');
            $subject->code = $request->input('code');
            $subject->type = $request->input('type');
            $subject->year = $request->input('year');
            $subject->abrev_name = $request->input('abrev_name');
            $careers = $request->input('career_id');
            $subject->carreras()->sync($careers);
            $subject->semester = '';
            $subject->semester = $request->input('semester');
            $subject->usuario_modificacion = Auth()->user()->id;
            $subject->updated_at = now();

            DB::beginTransaction();
            try {
                $subject->save();
                CoordinadorMateria::where('materia_id', $subject->id)->delete();
                if ($request->has('coordinador_id')) {

                    foreach ($request->input('coordinador_id') as $item) {
                        $coordmateria = new CoordinadorMateria();
                        $coordmateria->coordinador_id = $item;
                        $coordmateria->materia_id = $subject->id;

                        $coordmateria->save();
                    }
                }
                DB::commit();
                return redirect('/materias')->with('success', "Materia Editada correctamente.");
            } catch (Throwable $e) {
                report($e);
                DB::rollback();
                $request->session()->flash('error', 'Ha ocurrido un error!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::where('deleted_at', null)->where('id', $id)->first();
        $subject->deleted_at = now();
        $subject->usuario_baja = Auth()->user()->id;
        $subject->save();
        return redirect('/materias')->with('success', "Materia Eliminada correctamente.");
    }

    /**
     * Handle all Subjects
     *
     */
    public function subjects()
    {
        $subjects = Subject::all()->where('deleted_at', null);
        $title = '¡Borrar Materia!';
        $text = "¿Estás seguro que deseas borrar esta materia?";
        confirmDelete($title, $text);

        return view('auth.subject.subjects', ['subjects' => $subjects]);

    }

    /**
     * Handle a Subject
     *
     */
    public function subject($id)
    {
        $subject = Subject::where('id', $id)->where('deleted_at', null)->first();
        $careers = Career::all()->where('deleted_at', null);
        $colleges = College::all()->where('deleted_at', null);
        $coords = Persona::with("roles")->whereHas("roles", function ($q) {
            $q->whereIn("name", ['coordinador']);
        })->where('deleted_at', null)->get();
        $coordsmateria = CoordinadorMateria::where('materia_id', $id)->get();

        return view('auth.subject.subject', ['careers' => $careers, 'subject' => $subject, 'colleges' => $colleges, 'coords' => $coords, 'coordsmateria' => $coordsmateria]);
    }

    /**
     * Handle a Subject
     *
     */
    public function verMateria($id)
    {
        $subject = Subject::where('id', $id)->where('deleted_at', null)->first();
        $careers = Career::all()->where('deleted_at', null);
        $cargos = Cargo::all()->where('deleted_at', null)->where('subject_id', $id);
        $coords = CoordinadorMateria::where('materia_id', $id)->get();

        $coordsmateria = $this->allCoord($subject->id);


        return view('auth.subject.verMateria', ['careers' => $careers, 'subject' => $subject, 'cargos' => $cargos, 'coords' => $coords, 'coordsmateria' => $coordsmateria]);
    }

    public static function allCoord($id)
    {
        $subject = Subject::where('id', $id)->where('deleted_at', null)->first();

        $coords_helper = CoordinadorMateria::all()->where('materia_id', $id);
        $coordinadores = collect();

        if ($coords_helper != null) {
            foreach ($coords_helper as $coord) {
                $coordinadores = $coordinadores->push($coord->coordinador);
            }
        }

        foreach ($subject->carreras as $carrera) {
            $coords_helper = CoordinadorCarrera::all()->where('carrera_id', $carrera->id);
            if ($coords_helper != null) {
                foreach ($coords_helper as $coord) {
                    $coordinadores = $coordinadores->push($coord->coordinador);
                }
            }
            if ($carrera->facultad != null) {
                $coords_helper = CoordinadorDepto::all()->where('depto_id', $carrera->facultad->id);
                if ($coords_helper != null) {
                    foreach ($coords_helper as $coord) {
                        $coordinadores = $coordinadores->push($coord->coordinador);
                    }
                }
            }
        }
        $usuarios = collect();

        foreach ($coordinadores as $coordinador) {

                if ($coordinador) {
                    $usuarios = $usuarios->push($coordinador);
                }

        }
        //delete every coordinador repited and return the collection
        $coordinadores = $coordinadores->unique('id');
        return $coordinadores;
    }
}
