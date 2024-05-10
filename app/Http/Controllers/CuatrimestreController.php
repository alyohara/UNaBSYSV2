<?php

namespace App\Http\Controllers;

use App\Models\Cuatrimestre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuatrimestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuatrimestres = Cuatrimestre::all()->where('fecha_eliminacion', null);
        $title = '¡Borrar Cuatrimestre!';
        $text = "¿Estás seguro que deseas borrar este cuatrimestre?";
        confirmDelete($title, $text);
        return view('auth.cuatrimestres.index', compact('cuatrimestres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $last_Cuatrimestre = Cuatrimestre::latest()->first();
        return view('auth.cuatrimestres.create', compact('last_Cuatrimestre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cuatrimestre = new Cuatrimestre();
        $cuatrimestre->nombre = $request->nombre;
        $cuatrimestre->descripcion = $request->descripcion;
        $cuatrimestre->fecha_inicio = $request->fecha_inicio;
        $cuatrimestre->fecha_fin = $request->fecha_fin;
        $cuatrimestre->estado = "active";
        $cuatrimestre->fecha_creacion = now();
        $cuatrimestre->usuario_creacion = auth()->user()->id;
        $cuatrimestre->save();
        return redirect()->route('cuatrimestres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $last_Cuatrimestre = Cuatrimestre::latest()->first();
        $cuatrimestre = Cuatrimestre::find($id);
        return view('auth.cuatrimestres.show', compact('cuatrimestre', 'last_Cuatrimestre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cuatrimestre = Cuatrimestre::find($id);
        $last_Cuatrimestre = Cuatrimestre::latest()->first();
        return view('auth.cuatrimestres.edit', compact('cuatrimestre', 'last_Cuatrimestre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cuatrimestre = Cuatrimestre::find($request->cuatrimestre_id);
        $cuatrimestre->nombre = $request->nombre;
        $cuatrimestre->descripcion = $request->descripcion;
        $cuatrimestre->fecha_inicio = $request->fecha_inicio;
        $cuatrimestre->fecha_fin = $request->fecha_fin;
        $cuatrimestre->estado = "active";
        $cuatrimestre->fecha_actualizacion = now();
        $cuatrimestre->usuario_actualizacion = auth()->user()->id;
        $cuatrimestre->save();
        return redirect()->route('cuatrimestres.index')->with('success', "Materia Editada correctamente.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cuatrimestre = Cuatrimestre::find($id);
        $cuatrimestre->fecha_eliminacion = now();
        $cuatrimestre->usuario_eliminacion = auth()->user()->id;
        $cuatrimestre->estado = "inactive";
        $cuatrimestre->save();

        return redirect()->route('cuatrimestres.index')->with('success', "Materia Eliminada correctamente.");
    }
}
