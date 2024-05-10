<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use App\Models\Cargo;
use App\Models\CoordinadorMateria;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{

    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        /////////////////////////////////
        /// 1. Check Cargos
        ///
        /////////////////////////////////
        $cargos = Cargo::all()->where('deleted_at', null);
        foreach ($cargos as $cargo) {
            if ($cargo->fecha_alta < date('Y-m-d') && $cargo->fecha_baja > date('Y-m-d')) {

                if ($cargo->status == 0) {
                    $cargo->status = 1;
                    $cargo->usuario_modificacion = Auth()->user()->id;
                    $cargo->updated_at = now();
                    $alerta = new Alerta();
                    $cargo->save();
                    $alerta->tipo = 2;
                    $alerta->origen = 1;
                    $alerta->status = 2;
                    $alerta->titulo = 'Baja de Cargo';
                    $alerta->descripcion = 'Se ha dado de baja el cargo';
                    $alerta->user_id = Auth::user()->id;
                    $alerta->cargo_id = $cargo->id;
                    $alerta->materia_id = $cargo->subject_id;
                    $alerta->usuario_alta = Auth()->user()->id;
                    $alerta->save();
                }
            } else {
                if ($cargo->status == 1) {
                    $cargo->status = 0;
                    $cargo->usuario_modificacion = Auth()->user()->id;
                    $cargo->updated_at = now();
                    $alerta = new Alerta();
                    $alerta->usuario_alta = Auth()->user()->id;
                    $alerta->tipo = 1;
                    $alerta->origen = 1;
                    $alerta->status = 2;
                    if ($cargo->fecha_alta < date('Y-m-d') && $cargo->fecha_baja > date('Y-m-d')) {
                    } else {
                        $alerta->titulo = 'Alta de  Cargo fuera de rango de fechas';
                        $alerta->descripcion = 'Se ha dado de alta un cargo, pero fuera de rango de fechas de alta y baja del mismo';
                        $cargo->status = 0;
                    }
                    $alerta->user_id = Auth::user()->id;
                    $alerta->cargo_id = $cargo->id;
                    $alerta->materia_id = $cargo->subject_id;
                    $alerta->save();
                    $cargo->save();
                }
            }
        }






        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
