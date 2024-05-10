<?php

namespace App\Http\Controllers;

use App\Models\SedeDeCursada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SedeDeCursadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sedes = SedeDeCursada::all()->where('deleted_at', NULL);
        $title = '¡Borrar Sede!';
        $text = "¿Estás seguro que deseas borrar esta sede?";
        confirmDelete($title, $text);
        return view('auth.sede_de_cursada.index', ['sedes' => $sedes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.sede_de_cursada.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $sede = new SedeDeCursada();
            $sede->nombre = $request->input('nombre');
            $sede->descripcion = $request->input('descripcion');
            $sede->direccion = $request->input('direccion');
            $sede->usuario_alta = Auth::user()->id;
            $sede->save();

            DB::commit();
            return redirect('/sede_de_cursada')->with('success', "Sede registrada correctamente.");
        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SedeDeCursada $sedeDeCursada)
    {
        $sede = SedeDeCursada::find($sedeDeCursada->id);
        return view('auth.sede_de_cursada.show', ['sede' => $sede]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SedeDeCursada $sedeDeCursada)
    {
        $sede = SedeDeCursada::find($sedeDeCursada->id);
        return view('auth.sede_de_cursada.edit', ['sede' => $sede]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sede = SedeDeCursada::find($id);
        $sede->nombre = $request->input('nombre');
        $sede->descripcion = $request->input('descripcion');
        $sede->direccion = $request->input('direccion');
        $sede->usuario_modificacion = Auth::user()->id;
        $sede->updated_at = now();
        DB::beginTransaction();
        try {
            $sede->save();
            DB::commit();
            return redirect('/sede_de_cursada')->with('success', "Sede editada correctamente.");
        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy($id)
    {
        $sede = SedeDeCursada::find($id);
        $sede->usuario_baja = Auth::user()->id;
        $sede->deleted_at = now();
        DB::beginTransaction();
        try {
            $sede->save();
            DB::commit();
            return redirect('/sede_de_cursada')->with('success', "Sede eliminada correctamente.");
        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }


    }
}
