<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoordinadorRequest;
use App\Models\Career;
use App\Models\Cargo;
use App\Models\College;
use App\Models\Coordinador;
use App\Models\CoordinadorCarrera;
use App\Models\CoordinadorDepto;
use App\Models\CoordinadorMateria;
use App\Models\Persona;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinadores = Coordinador::all()->where('deleted_at', null);
        $title = '¡Borrar Coordinador!';
        $text = "¿Estás seguro que deseas borrar este coordinador?";
        confirmDelete($title, $text);
        return view('auth.coordinadores.index', compact('coordinadores'));
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
    public function store(CoordinadorRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->validated()) {
                //buscar existencia coordinador


                $coordinador = Coordinador::where('user_id',$request->input('user_id'))->first();

                if (!$coordinador){
                    $coordinador = new Coordinador();
                    $coordinador->user_id = $request->input('user_id');
                    $coordinador->tipo = 'coordinador';
                    $coordinador->estado = 'activo';
                    $coordinador->save();
                }
                if ($request->has('depto_id')) {
                    foreach ($request->input('depto_id') as $item) {
                        $coordepto = new CoordinadorDepto();
                        $coordepto->coordinador_id = $coordinador->id;
                        $coordepto->depto_id = $item;
                        $coordepto->save();
                    }
                }
                if ($request->has('career_id')) {
                    foreach ($request->input('career_id') as $item) {
                        $coorcarrera = new CoordinadorCarrera();
                        $coorcarrera->coordinador_id = $coordinador->id;
                        $coorcarrera->carrera_id = $item;
                        $coorcarrera->save();
                    }
                }
                if ($request->has('materia_id')) {
                    foreach ($request->input('materia_id') as $item) {
                        $coormateria = new CoordinadorMateria();
                        $coormateria->coordinador_id = $coordinador->id;
                        $coormateria->materia_id = $item;
                        $coormateria->save();
                    }
                }
                DB::commit();
                return redirect('/coordinadores')->with('success', "Coordinador registrado correctamente.");
            }


        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Coordinador $coordinador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $deptos = College::all();
        $carreras = Career::all();
        $materias = Subject::all();
        $docentes_coordinados = CargoController::viewAllDocentesCoordinadosViaMaterias($id);

        return view('auth.coordinadores.register', compact('user', 'deptos', 'carreras', 'materias', 'docentes_coordinados'));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Coordinador $coordinador
     * @return \Illuminate\Http\Response
     */
    public function show2()
    {
//        $coordsNotWorking = Persona::with("roles")->whereHas("roles", function ($q) {
//            $q->whereIn("id", [6])->toSql();
//        })->get();
        $coords = Persona::whereHas(
            'roles', function($q){
            $q->where('name', 'coordinador');
        }
        )->get();
        $deptos = College::all();
        $carreras = Career::all();
        $materias = Subject::all();
        return view('auth.coordinadores.agregar', compact('coords', 'deptos', 'carreras', 'materias'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Coordinador $coordinador
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinador $coordinador)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Coordinador $coordinador
     * @return \Illuminate\Http\Response
     */
    public function update(CoordinadorRequest $request, Coordinador $coordinador)
    {
        DB::beginTransaction();
        try {
            if ($request->validated()) {
                //buscar existencia coordinador
                $coordinador = Coordinador::find($request->input('coordinador_id'));
                CoordinadorDepto::where('coordinador_id', $coordinador->id)->delete();
                CoordinadorCarrera::where('coordinador_id', $coordinador->id)->delete();
                CoordinadorMateria::where('coordinador_id', $coordinador->id)->delete();

                if ($request->has('depto_id')) {
                    foreach ($request->input('depto_id') as $item) {
                        $coordepto = new CoordinadorDepto();
                        $coordepto->coordinador_id = $coordinador->id;
                        $coordepto->depto_id = $item;
                        $coordepto->save();
                    }
                }
                if ($request->has('career_id')) {
                    foreach ($request->input('career_id') as $item) {
                        $coorcarrera = new CoordinadorCarrera();
                        $coorcarrera->coordinador_id = $coordinador->id;
                        $coorcarrera->carrera_id = $item;
                        $coorcarrera->save();
                    }
                }
                if ($request->has('materia_id')) {

                    foreach ($request->input('materia_id') as $item) {
                        $coormateria = new CoordinadorMateria();
                        $coormateria->coordinador_id = $coordinador->id;
                        $coormateria->materia_id = $item;
                        $coormateria->save();
                    }
                }
                DB::commit();
                return redirect('/coordinadores')->with('success', "Coordinador editado correctamente.");
            }


        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Coordinador $coordinador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coordinador = Coordinador::find($id);
        $coordinador->deleted_at = now();
        $coordinador->usuario_baja = Auth::user()->id;
        $coordinador->save();
        return redirect('/coordinadores')->with('success', "Coordinador eliminado correctamente.");
    }

    /** Handle a coordination
     *
     */
    public function coordinador($id)
    {
        $coordinador = Coordinador::find($id);
        $deptos = College::all();
        $users = User::all();
        $carreras = Career::all();
        $materias = Subject::all();
        $deptos_coordinados = CoordinadorDepto::all()->where('coordinador_id', $id);
        $carreras_coordinadas = CoordinadorCarrera::all()->where('coordinador_id', $id);
        $materias_coordinadas = CoordinadorMateria::all()->where('coordinador_id', $id);

        return view('auth.coordinadores.coordinador', compact('coordinador', 'deptos', 'carreras', 'materias', 'users', 'deptos_coordinados', 'carreras_coordinadas', 'materias_coordinadas'));

    }
    /**
     * view a coordinador
     *
     */
    public function verCoordinador($id)
    {
        $coordinador = Coordinador::find($id);

        $deptos_coordinados = CoordinadorDepto::all()->where('coordinador_id', $id);
        $carreras_coordinadas = CoordinadorCarrera::all()->where('coordinador_id', $id);
        $materias_coordinadas = CoordinadorMateria::all()->where('coordinador_id', $id);
        $docentes_coordinados = CargoController::viewAllDocentesCoordinadosViaMaterias($id);

        return view('auth.coordinadores.verCoordinador',  compact('coordinador',  'deptos_coordinados', 'carreras_coordinadas', 'materias_coordinadas', 'docentes_coordinados'));

    }
    /**
     * change status of a coordinador
     *
     */
    public function statusCoordinador($id){
        $coordinador = Coordinador::find($id);
        if($coordinador->estado == "activo"){
            $coordinador->estado = "inactivo";
        }else{
            $coordinador->estado = "activo";
        }
        $coordinador->save();
        return redirect('/coordinadores')->with('success', "Coordinador editado correctamente.");
    }

    /**
     * see my coordinations
     *
     */
    public function coordinados()
    {
        $coordinador = Coordinador::where('user_id', Auth::user()->id)->first();
        $deptos_coordinados = CoordinadorDepto::all()->where('coordinador_id', $coordinador->id);
        $carreras_coordinadas = CoordinadorCarrera::all()->where('coordinador_id', $coordinador->id);
        $materias_coordinadas = CoordinadorMateria::all()->where('coordinador_id', $coordinador->id);
        return view('auth.coordinadores.misCoordinaciones', compact('deptos_coordinados', 'carreras_coordinadas', 'materias_coordinadas'));
    }

    /**
     * see my profs coordinations
     *
     */
    public function profCoordinados()
    {
        $coordinador = Coordinador::where('user_id', Auth::user()->id)->first();
        $deptos_coordinados = CoordinadorDepto::all()->where('coordinador_id', $coordinador->id);
        $carreras_coordinadas = CoordinadorCarrera::all()->where('coordinador_id', $coordinador->id);
        $materias_coordinadas = CoordinadorMateria::all()->where('coordinador_id', $coordinador->id);
        $profesores_coordinados = collect();


        foreach($materias_coordinadas as $materia_coordinada){
            $collections = Cargo::where('subject_id', $materia_coordinada->materia_id)->where('status',1)->get();

            $merged = $profesores_coordinados->merge($collections);

            $profesores_coordinados = $merged;


        }
        return view('auth.coordinadores.profCoordinados', compact('deptos_coordinados', 'carreras_coordinadas', 'materias_coordinadas', 'profesores_coordinados'));
    }



}
