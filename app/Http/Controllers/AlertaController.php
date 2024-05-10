<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use App\Models\Coordinador;
use App\Models\CoordinadorMateria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;


class AlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = Alerta::all()->where('deleted_at', null);
        $alertas = array();
        $coordinador = Coordinador::where('user_id', Auth::user()->id)->where('deleted_at', null)->first();
        foreach ($alerts as $alerta) {
            $soyCoordinador = CoordinadorMateria::where('coordinador_id', $coordinador->id)->where('materia_id', $alerta->materia_id)->first();
            if ($soyCoordinador) {
                $alertas[] = $alerta;
            }
        }
        return view('auth.alertas.index', compact('alertas'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function show(Alerta $alerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function edit(Alerta $alerta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alerta $alerta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alerta = Alerta::find($id);
        $alerta->deleted_at = date('Y-m-d H:i:s');
        $alerta->usuario_baja = Auth::user()->id;
        $alerta->save();
        return redirect()->route('alertas.index');
    }

    /**
     * view an alert
     *
     */
    public function verAlerta($id)
    {
        $alerta = Alerta::find($id);
        $alerta->status = 1;
        $alerta->save();

        return view('auth.alertas.verAlerta', ['alerta' => $alerta]);

    }
}
