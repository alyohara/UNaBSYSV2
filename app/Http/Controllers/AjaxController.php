<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use App\Models\Career;
use App\Models\Cargo;
use App\Models\Coordinador;
use App\Models\CoordinadorMateria;
use App\Models\Persona;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AjaxController extends Controller
{
    /**
     *
     * @return void
     */
    public function getCarreras($facultad_id)
    {
        $careers = Career::all()->where('college_id', $facultad_id)->where('deleted_at', null);
        $cars = array();

        foreach ($careers as $car) {
            $item = [
                'id' => $car->id,
                'name' => $car->name];
            $cars[] = $item;
        }
        $respuesta = [
            'cantidad' => count($cars),
            'careers' => $cars,
        ];


        return response()->json($respuesta, 200);
    }

    /**
     *
     * @return void
     */
    public function getMaterias($carrera_id)
    {
        $materias = Career::find($carrera_id)->materias;

        $mats = array();

        foreach ($materias as $mat) {
            $item = [
                'id' => $mat->id,
                'name' => $mat->name];
            $mats[] = $item;
        }
        $respuesta = [
            'cantidad' => count($mats),
            'materias' => $mats,
        ];


        return response()->json($respuesta, 200);
    }

    /**
     *
     * @return void
     */
    public function getMateriasByProfesor($profesor_id)
    {
        $cargos = Cargo::all()->where('deleted_at', null);

        $mats = array();

        foreach ($cargos as $mat) {
            $item = [
                'id' => $mat->materia->id,
                'name' => $mat->materia->name,
                'codigo' => $mat->materia->code,];
            $mats[] = $item;
        }
        $respuesta = [
            'cantidad' => count($mats),
            'materias' => $mats,
        ];
        return response()->json($respuesta, 200);
    }

    /**
     *
     * @return void
     */
    public function getProfesoresByMateria($materia_id)
    {
        $cargos = Cargo::all()->where('deleted_at', null);

        $profs = array();

        foreach ($cargos as $prof) {
            if ($prof->subject_id == $materia_id) {
                $item = [
                    'id' => $prof->persona->id,
                    'name' => $prof->persona->name,
                    'lastname' => $prof->persona->lastname];
                $profs[] = $item;
            }
        }
        $respuesta = [
            'cantidad' => count($profs),
            'profesores' => $profs,
            'materiaid' => $materia_id,
        ];
        return response()->json($respuesta, 200);
    }

    /**
     *
     * @return void
     */
    public function getDocente($dni)
    {
        $docente = Persona::where('doc', $dni)->where('deleted_at', null)->first();
        if (empty($docente->doc)) {
            $respuesta = [
                'cantidad' => 0,
                'docente' => $docente,
            ];
        } else {
            if ($docente->hasRole('profesor')) {
                if (!empty($docente->cv_id)) {
                    $respuesta = [
                        'docente' => $docente,
                        'dni' => $dni,
                        'cv_path' => asset($docente->curriculum->file_path),
                    ];
                } else {
                    $respuesta = [
                        'docente' => $docente,
                        'dni' => $dni,
                        'cv_path' => null,

                    ];
                }
            } else {
                $respuesta = [
                    'docente' => 'epned',
                ];
            }
        }


        return response()->json($respuesta, 200);
    }

    /**
     *
     * @return void
     */
    public function getDocenteNotUser($dni)
    {
        $docente = Persona::where('doc', $dni)->where('deleted_at', null)->first();
        if (empty($docente->doc)) {
            $respuesta = [
                'cantidad' => 0,
                'docente' => $docente,
            ];
        } else {
            if (User::where('persona_id', $docente->id)->where('deleted_at', null)->first()) {
                $respuesta = [
                    'docente' => 'epned',
                ];
            } else {
                if ($docente->hasRole('profesor')) {
                    if (!empty($docente->cv_id)) {
                        $respuesta = [
                            'docente' => $docente,
                            'dni' => $dni,
                            'roles' => $docente->roles,
                            'cv_path' => asset($docente->curriculum->file_path),
                        ];
                    } else {
                        $respuesta = [
                            'docente' => $docente,
                            'dni' => $dni,
                            'roles' => $docente->roles,
                            'cv_path' => null,
                        ];
                    }
                }
            }
        }
        return response()->json($respuesta, 200);
    }

    /**
     *
     * @return void
     */
    public
    function getPersonaData($dni)
    {
        $persona = Persona::where('doc', $dni)->where('deleted_at', null)->first();
        if ($persona) {
            if (User::where('persona_id', $persona->id)->where('deleted_at', null)->first()) {
                $user = User::where('persona_id', $persona->id)->where('deleted_at', null)->first();
                $respuesta = [
                    'existente' => true,
                    'persona' => $persona,
                    'user' => $user,
                    'dni' => $dni
                ];
            } else {
                $respuesta = [
                    'existente' => false,
                    'persona' => $persona,
                    'dni' => $dni
                ];
            }
        } else {
            $respuesta = [
                'existente' => false,
                'persona' => null,
                'dni' => $dni
            ];
        }
        return response()->json($respuesta, 200);
    }
    public static function getAlerts($id)
    {
        /////////////////////////////////
        /// 2. Check Alerts
        ///
        /////////////////////////////////
        $user = User::find($id);
        $contador = 0;


//        if ($user->userData->hasRole('coordinador')) {
//            $coordinador = Coordinador::where('user_id', $id)->first();
//            // Fetch the Site Settings object
//            $alertas = Alerta::all()->where('status', 2);
//            foreach ($alertas as $alerta) {
//                $soyCoordinador = CoordinadorMateria::where('coordinador_id', $coordinador->id)->where('materia_id', $alerta->materia_id)->first();
//                if ($soyCoordinador) {
//                    $contador++;
//                }
//            }
//        }
        return $contador ;
    }


}
