<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsistenciaRequest;
use App\Models\Asistencia;
use App\Models\Cargo;
use App\Models\Persona;
use App\Models\SedeDeCursada;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AsistenciaController extends Controller
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
    public function store(AsistenciaRequest $request)
    {
        DB::beginTransaction();
        try {
            $asistencia = Asistencia::create($request->validated());
            $asistencia->usuario_alta = auth()->user()->id;
            $asistencia->sede_de_cursada = $request->input('sede_de_cursada');

            if ($request->tipo == 'porFecha') {
                $asistencia->fecha_inicio = null;
                $asistencia->fecha_fin = null;
                $asistencia->tipo = 'porFecha';
                $asistencia->fecha = $request->fecha;
            } else {
                $asistencia->fecha = null;
                $asistencia->tipo = 'porPeriodo';
                $asistencia->fecha_inicio = $request->fecha_inicio;
                $asistencia->fecha_fin = $request->fecha_fin;
            }
            $asistencia->save();

            DB::commit();
            return redirect('/asistencias')->with('success', "Asistencia registrada correctamente.");
        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        $asistencias = Asistencia::all()->where('deleted_at', null);
        $profesors = Persona::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'profesor');
        })->where('deleted_at', null)->get();
        $sedes = SedeDeCursada::all()->where('deleted_at', null);


        $materias = Subject::all()->where('deleted_at', null);
        return view('auth.asistencia.register', [
            'asistencias' => $asistencias,
            'profesores' => $profesors,
            'materias' => $materias,
            'sedes' => $sedes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(AsistenciaRequest $request, Asistencia $asistencia)
    {
        DB::beginTransaction();
        try {
            if ($request->validated()) {
                $asistencia = Asistencia::where('id', $request->id)->where('deleted_at', null)->first();
                $asistencia->profesor_id = $request->input('profesor_id');
                $asistencia->subject_id = $request->input('subject_id');
                $asistencia->bedel_id = $request->input('bedel_id');
                $asistencia->usuario_modificacion = auth()->user()->id;
                $asistencia->updated_at = date('Y-m-d H:i:s');
                $asistencia->sede_de_cursada = $request->input('sede_de_cursada');
                if ($request->tipo == 'porFecha') {
                    $asistencia->fecha_inicio = null;
                    $asistencia->fecha_fin = null;
                    $asistencia->tipo = 'porFecha';
                    $asistencia->fecha = $request->fecha;
                } else {
                    $asistencia->fecha = null;
                    $asistencia->tipo = 'porPeriodo';
                    $asistencia->fecha_inicio = $request->fecha_inicio;
                    $asistencia->fecha_fin = $request->fecha_fin;
                }
                $asistencia->status = $request->input('status');
                $asistencia->save();


                DB::commit();
                return redirect('/asistencias')->with('success', "Asistencia actualizada correctamente.");
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
     * @param \App\Models\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $asistencia = Asistencia::find($id);
            $asistencia->deleted_at = date('Y-m-d H:i:s');
            $asistencia->usuario_baja = auth()->user()->id;
            $asistencia->save();
            DB::commit();
            return redirect('/asistencias')->with('success', "Asistencia eliminada correctamente.");
        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function asistencias()
    {
        $asistencias = Asistencia::all()->where('deleted_at', null);
        $title = '¡Borrar Asistencia!';
        $text = "¿Estás seguro que deseas borrar esta asistencia?";
        confirmDelete($title, $text);
        return view('auth.asistencia.asistencias', ['asistencias' => $asistencias]);
    }

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asistencia($id)
    {

        $asistencia = Asistencia::where('id', $id)->where('deleted_at', null)->first();
        $profesors = Persona::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'profesor');
        })->where('deleted_at', null)->get();
        $cargosMat = Cargo::all()->where('persona_id', $asistencia->profesor_id);
        $cargosProf = Cargo::all()->where('subject_id', $asistencia->subject_id);
        $sedes = SedeDeCursada::all()->where('deleted_at', null);

        $materias = Subject::all()->where('deleted_at', null);
        return view('auth.asistencia.asistencia', [
            'asistencia' => $asistencia,
            'profesores' => $profesors,
            'materias' => $materias,
            'cargosMat' => $cargosMat,
            'cargosProf' => $cargosProf,
            'sedes' => $sedes,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verAsistencia($id)
    {
        $asistencia = Asistencia::where('id', $id)->where('deleted_at', null)->first();
        return view('auth.asistencia.verAsistencia', ['asistencia' => $asistencia]);
    }
}
