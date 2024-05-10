<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use App\Models\College;
use App\Models\CoordinadorCarrera;
use App\Models\CoordinadorDepto;
use App\Models\Persona;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CareerController extends Controller
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
    public function store(CareerRequest $request)
    {

        if ($request->validated()) {
            $name = $request->input('name');
            $dateInit = $request->input('dateInit');
            $years = $request->input('years');
            $data = '';
            $data = $request->input('data');
            $college_id = '';
            $college_id = $request->input('college_id');
            $CodigoSIU = $request->input('CodigoSIU');
            $DenominacionCarrera = $request->input('DenominacionCarrera');
            $Titulo = $request->input('Titulo');
            $ResolucionAprobacionCS = '';
            $ResolucionCorrelativasCS = '';
            $ResolucionMinisterial = '';
            $ResolucionAprobacionCS = $request->input('ResolucionAprobacionCS');
            $ResolucionCorrelativasCS = $request->input('ResolucionCorrelativasCS');
            $ResolucionMinisterial = $request->input('ResolucionMinisterial');
            $carrera = new Career();

                $carrera->name = $name;
                $carrera->dateInit = $dateInit;
                $carrera->years = $years;
                $carrera->data = $data;
                $carrera->college_id = $college_id;
                $carrera->CodigoSIU = $CodigoSIU;
                $carrera->DenominacionCarrera = $DenominacionCarrera;
                $carrera->Titulo = $Titulo;
                $carrera->ResolucionAprobacionCS = $ResolucionAprobacionCS;
                $carrera->ResolucionCorrelativasCS = $ResolucionCorrelativasCS;
                $carrera->ResolucionMinisterial = $ResolucionMinisterial;
                $carrera->usuario_alta = auth()->user()->id;



            DB::beginTransaction();
            try {
                $carrera->save();
                if ($request->has('coordinador_id')) {

                    foreach ($request->input('coordinador_id') as $item) {
                        $coordcarrera = new CoordinadorCarrera();
                        $coordcarrera->coordinador_id = $item;
                        $coordcarrera->carrera_id = $carrera->id;

                        $coordcarrera->save();
                    }
                }
                DB::commit();
                return redirect('/carreras')->with('success', "Carrera Creada correctamente.");
            } catch (Throwable $e) {
                report($e);
                DB::rollback();
                $request->session()->flash('error', 'Ha ocurrido un error!');
            }
        }


//        DB::beginTransaction();
//        try {
//            $carrera = Career::create($request->validated());
//            DB::commit();
//            return redirect('/carreras')->with('success', "Carrera registrada correctamente.");
//        } catch (Throwable $e) {
//            report($e);
//            DB::rollback();
//            $request->session()->flash('error', 'Ha ocurrido un error!');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Career $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        $colleges = College::all()->where('deleted_at', null);
        $coords = Persona::with("roles")->whereHas("roles", function ($q) {
            $q->whereIn("name", ['coordinador']);
        })->where('deleted_at', null)->get();
        $profesors = Persona::with("roles")->whereHas("roles", function ($q) {
            $q->whereIn("name", ['profesor']);
        })->where('deleted_at', null)->get();
        return view('auth.career.register', ['colleges' => $colleges, 'profesors' => $profesors, 'coords' => $coords]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Career $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Career $career
     * @return \Illuminate\Http\Response
     */
    public function update(CareerRequest $request, Career $career)
    {
        if ($request->validated()) {

            $carrera = Career::find($request->input('career_id'));
            $carrera->name = $request->input('name');
            $carrera->dateInit = $request->input('dateInit');
            $carrera->years = $request->input('years');
            $carrera->data = '';
            $carrera->data = $request->input('data');
            $carrera->college_id = '';
            $carrera->college_id = $request->input('college_id');
            $carrera->CodigoSIU = $request->input('CodigoSIU');
            $carrera->DenominacionCarrera = $request->input('DenominacionCarrera');
            $carrera->Titulo = $request->input('Titulo');
            $carrera->ResolucionAprobacionCS = '';
            $carrera->ResolucionCorrelativasCS = '';
            $carrera->ResolucionMinisterial = '';
            $carrera->ResolucionAprobacionCS = $request->input('ResolucionAprobacionCS');
            $carrera->ResolucionCorrelativasCS = $request->input('ResolucionCorrelativasCS');
            $carrera->ResolucionMinisterial = $request->input('ResolucionMinisterial');
            $carrera->usuario_modificacion = auth()->user()->id;
            $carrera->updated_at = now();


            DB::beginTransaction();
            try {
                $carrera->save();
                CoordinadorCarrera::where('carrera_id', $carrera->id)->delete();
                if ($request->has('coordinador_id')) {

                    foreach ($request->input('coordinador_id') as $item) {
                        $coordepto = new CoordinadorCarrera();
                        $coordepto->coordinador_id = $item;
                        $coordepto->carrera_id = $carrera->id;

                        $coordepto->save();
                    }
                }
                DB::commit();
                return redirect('/carreras')->with('success', "Carrera Editada correctamente.");
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
     * @param \App\Models\Career $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = Career::where('id', $id)->where('deleted_at', null)->first();
        $career->deleted_at = now();
        $career->usuario_baja = auth()->user()->id;
        $career->save();
        return redirect('/carreras')->with('success', "Carrera Eliminada correctamente.");
    }

    /**
     * Handle all careers
     *
     */
    public function careers()
    {
        $careers = Career::all()->where('deleted_at', null);
        $title = '¡Borrar Carrera!';
        $text = "¿Estás seguro que deseas borrar esta carrera?";
        confirmDelete($title, $text);

        return view('auth.career.careers', ['careers' => $careers]);

    }

    /**
     * Handle a career
     *
     */
    public function career($id)
    {
        $career = Career::where('id', $id)->where('deleted_at', null)->first();
        $colleges = College::all()->where('deleted_at', null);
        $coords = Persona::with("roles")->whereHas("roles", function ($q) {
            $q->whereIn("name", ['coordinador']);
        })->where('deleted_at', null)->get();
        $coordscarrera = CoordinadorCarrera::where('carrera_id', $id)->get();
        return view('auth.career.career', ['career' => $career, 'colleges' => $colleges, 'coords' => $coords, 'coordscarrera' => $coordscarrera]);
    }

    /**
     * view a career
     *
     */
    public function verCarrera($id)
    {
        $career = Career::where('id', $id)->where('deleted_at', null)->first();
        $subjects = $career->materias;
        $coords = CoordinadorCarrera::where('carrera_id', $id)->get();
        return view('auth.career.verCarrera', ['career' => $career, 'subjects' => $subjects, 'coords' => $coords]);

    }
}
