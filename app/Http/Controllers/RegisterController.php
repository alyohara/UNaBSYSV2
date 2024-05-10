<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\RegisterDocRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Alerta;
use App\Models\Career;
use App\Models\Cargo;
use App\Models\College;
use App\Models\File;
use App\Models\Persona;
use App\Models\Subject;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cmgmyr\Messenger\Traits\Messagable;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    use Messagable;
    public function show()
    {
        $user = Auth::user();
        $types = UserType::all()->where('id', '>=', $user->userData->userType_id)->sortDesc();
        $colleges = College::all()->where('deleted_at', null);
        $careers = Career::all()->where('deleted_at', null);
        $subjects = Subject::all()->where('deleted_at', null);
        return view('auth.register', ['types' => $types, 'colleges' => $colleges, 'careers' => $careers, 'subjects' => $subjects]);
    }

    public function destroy($id)
    {

        $user = User::where('id', $id)->first();
        $user->deleted_at = now();
        $user->usuario_baja = Auth()->user()->id;
        //borrar coordinaciones si tiene el rol coordinador
        if ($user->hasRole('coordinador')) {
            $coordinaciones = $user->coordinaciones;
            foreach ($coordinaciones as $coordinacion) {
                $coordinacion->deleted_at = now();
                $coordinacion->usuario_baja = Auth()->user()->id;
                $coordinacion->save();
            }
        }
        //borrar cargos si tiene el rol docente
        if ($user->hasRole('profesor')) {
            $cargos = $user->cargos;
            foreach ($cargos as $cargo) {
                $cargo->deleted_at = now();
                $cargo->usuario_baja = Auth()->user()->id;
                $cargo->save();
            }
        }


        $user->save();
        return redirect('/users')->with('success', "Usuario borrado correctamente.");
    }

    public function show2($id)
    {
        $user = Auth::user();
        $types = UserType::all()->where('id', '>=', $user->userData->userType_id)->sortDesc();
        $colleges = College::all()->where('deleted_at', null);
        $careers = Career::all()->where('deleted_at', null);
        $subjects = Subject::all()->where('deleted_at', null);
        $persona = Persona::where('id', $id)->where('deleted_at', null)->first();
        return view('auth.registerDoc', ['types' => $types, 'colleges' => $colleges, 'careers' => $careers, 'subjects' => $subjects, 'persona' => $persona]);
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {


        $persona = new Persona();
        // si la persona es docente y existe de antes, es decir, edit tiene datos
        if ($request->edit != null) {
            $persona = Persona::find($request->edit);
            $persona->name = $request->name;
            $persona->lastname = $request->lastname;
            $persona->doc = $request->doc;
            $persona->email = $request->profesional_email;
            $persona->personal_email = $request->personal_email;
            $persona->usuario_modificacion = Auth()->user()->id;
            $persona->updated_at = now();
            DB::beginTransaction();
            $persona->save();
            DB::commit();
        } else {
            DB::beginTransaction();
            $persona = Persona::create($request->validated());
            $persona->usuario_alta = Auth()->user()->id;
            $persona->email = $request->profesional_email;
            $persona->personal_email = $request->personal_email;
            $persona->save();
            DB::commit();
        }

        DB::beginTransaction();
        try {
            $fileid = NULL;
            if ($request->file) {
                $fileModel = new File;
                $fileName = time() . '_' . $request->file->getClientOriginalName();

                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
                $fileid = $fileModel->id;
            }

            $user = new User($request->validated());
            $user->persona_id = $persona->id;
            $persona->cv_id = $fileid;

            if ($request->has('admin')) {
                $persona->assignRole('admin');
            }
            if ($request->has('acaUno')) {
                $persona->assignRole('acaUno');
            }
            if ($request->has('acaDos')) {
                $persona->assignRole('acaDos');
            }
            if ($request->has('bedel')) {
                $persona->assignRole('bedel');
            }
            if ($request->has('coordinador')) {
                $persona->assignRole('coordinador');
            }
            if ($request->has('basic')) {
                $persona->assignRole('basic');
            }
            if ($request->has('profesor')) {
                $persona->assignRole('profesor');
                //ver si se guarda un cargo
                if ($request->has('Docencia')) {
                    $persona->Docencia = 'Si';
                } else {
                    $persona->Docencia = 'No';
                }
                if ($request->has('Investigacion')) {
                    $persona->Investigacion = 'Si';
                } else {
                    $persona->Investigacion = 'No';
                }
                if ($request->has('Extension')) {
                    $persona->Extension = 'Si';
                } else {
                    $persona->Extension = 'No';
                }
                if ($request->has('Gestion')) {
                    $persona->Gestion = 'Si';
                } else {
                    $persona->Gestion = 'No';
                }
                if ($request->has('cargoSwitch')) {
                    $cargo = new Cargo;
                    $cargo->persona_id = $persona->id;
                    $cargo->subject_id = $request->input('subject_id');
                    $cargo->tipo = $request->input('tipo');
                    $cargo->fecha_alta = $request->input('fecha_alta');
                    $cargo->fecha_baja = $request->input('fecha_baja');
                    $cargo->act_des = $request->input('act_des');
                    $cargo->categoria = $request->input('categoria');
                    $cargo->dedicacion_horaria = $request->input('dedicacion_horaria');
                    $cargo->status = 1;
                    $cargo->usuario_alta = Auth()->user()->id;
                    $cargo->save();

                    $alerta =new Alerta();
                    $alerta->usuario_alta = Auth()->user()->id;
                    if($request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') > date('Y-m-d')  || $request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') == null){
                        $alerta->titulo = 'Alta de nuevo Cargo';
                        $alerta->descripcion = 'Se ha dado de alta un nuevo cargo';
                    } else {
                        $alerta->titulo = 'Alta de nuevo Cargo fuera de rango de fechas';
                        $alerta->descripcion = 'Se ha dado de alta un nuevo cargo, pero fuera de rango de fechas de alta y baja del mismo';
                        $cargo->status = 0;
                        $cargo->save();
                    }

                    $alerta->tipo = 1;
                    $alerta->origen = 2;
                    $alerta->status = 2;
                    $alerta->user_id = Auth::user()->id;
                    $alerta->cargo_id = $cargo->id;
                    $alerta->materia_id = $cargo->subject_id;
                    $alerta->save();
                }

            };

            $persona->save();
            $user->save();
            DB::commit();
            if ($persona->hasRole('coordinador')) {
                return redirect()->action(
                    [CoordinadorController::class, 'show'], $user->id
                );

            } else {
                return redirect('/users')->with('success', "Usuario registrado correctamente.");
            }

        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }

    /**
     * Handle account update request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $userid = $request->input('userid');
        $user = User::find($userid);
        if ($request->validated()) {

            $persona = Persona::find($user->persona_id);
            $persona->name = $request->input('name');
            $persona->lastname = $request->input('lastname');
            $persona->address = $request->input('address');
            $persona->birth = $request->input('birth');
            $persona->gender = $request->input('gender');
            $persona->phone = $request->input('phone');
            $persona->doc = $request->input('doc');
            $persona->email = $request->input('profesional_email');
            $persona->personal_email = $request->input('personal_email');
            $persona->usuario_modificacion = Auth()->user()->id;
            $persona->updated_at = now();


            $persona->roles()->detach();

            if ($request->has('admin')) {
                $persona->assignRole('admin');
            }
            if ($request->has('acaUno')) {
                $persona->assignRole('acaUno');
            }
            if ($request->has('acaDos')) {
                $persona->assignRole('acaDos');
            }
            if ($request->has('bedel')) {
                $persona->assignRole('bedel');
            }
            if ($request->has('coordinador')) {
                $persona->assignRole('coordinador');
            }
            if ($request->has('basic')) {
                $persona->assignRole('basic');
            }
            if ($request->has('profesor')) {
                $persona->assignRole('profesor');

                if ($request->has('Docencia')) {
                    $persona->Docencia = 'Si';
                } else {
                    $persona->Docencia = 'No';
                }
                if ($request->has('Investigacion')) {
                    $persona->Investigacion = 'Si';
                } else {
                    $persona->Investigacion = 'No';
                }
                if ($request->has('Extension')) {
                    $persona->Extension = 'Si';
                } else {
                    $persona->Extension = 'No';
                }
                if ($request->has('Gestion')) {
                    $persona->Gestion = 'Si';
                } else {
                    $persona->Gestion = 'No';
                }
                if ($request->has('cargoSwitch')) {
                    $cargo = new Cargo;
                    $cargo->persona_id = $persona->id;
                    $cargo->subject_id = $request->input('subject_id');
                    $cargo->tipo = $request->input('tipo');
                    $cargo->fecha_alta = $request->input('fecha_alta');
                    $cargo->fecha_baja = $request->input('fecha_baja');
                    $cargo->act_des = $request->input('act_des');
                    $cargo->categoria = $request->input('categoria');
                    $cargo->dedicacion_horaria = $request->input('dedicacion_horaria');
                    $cargo->usuario_alta = Auth()->user()->id;
                    DB::beginTransaction();
                    try {
                        $cargo->status = 1;
                        $cargo->save();

                        $alerta =new Alerta();
                        $alerta->usuario_alta = Auth()->user()->id;
                        if($request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') > date('Y-m-d')  || $request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') == null){
                            $alerta->titulo = 'Alta de nuevo Cargo';
                            $alerta->descripcion = 'Se ha dado de alta un nuevo cargo';
                        } else {
                            $alerta->titulo = 'Alta de nuevo Cargo fuera de rango de fechas';
                            $alerta->descripcion = 'Se ha dado de alta un nuevo cargo, pero fuera de rango de fechas de alta y baja del mismo';
                            $cargo->status = 0;
                            $cargo->save();
                        }

                        $alerta->tipo = 1;
                        $alerta->origen = 2;
                        $alerta->status = 2;
                        $alerta->user_id = Auth::user()->id;
                        $alerta->cargo_id = $cargo->id;
                        $alerta->materia_id = $cargo->subject_id;
                        $alerta->save();
                        DB::commit();
                    } catch (Throwable $e) {
                        report($e);
                        DB::rollback();
                        $request->session()->flash('error', 'Ha ocurrido un error!');
                    }
                }

            };


            DB::beginTransaction();
            try {
                if ($request->file) {
                    $fileModel = new File;
                    $fileName = time() . '_' . $request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                    $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
                    $fileModel->file_path ='/storage/' . $filePath;
                    $fileModel->save();
                    $persona->cv_id = $fileModel->id;
                }
                $user->save();
                $persona->save();
                DB::commit();
                    return redirect('/users')->with('success', "Usuario registrado correctamente.");
            } catch (Throwable $e) {
                report($e);
                DB::rollback();
                $request->session()->flash('error', 'Ha ocurrido un error!');
            }
        }
    }

    /**
     * Handle account update request
     *
     * @param UpdateProfileRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $userid = $request->input('userid');
        $user = User::where('id', $userid)->where('deleted_at', null)->first();
        if ($request->validated()) {
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->usuario_modificacion = Auth()->user()->id;
            $user->updated_at = now();
            if ($request->input('changePass')) {
                $user->password = $request->input('password');
            }

            $persona = Persona::find($user->persona_id);
            $persona->name = $request->input('name');
            $persona->email = $request->input('profesional_email');
            $persona->personal_email = $request->input('personal_email');
            $persona->lastname = $request->input('lastname');
            $persona->address = $request->input('address');
            $persona->birth = $request->input('birth');
            $persona->gender = $request->input('gender');
            $persona->phone = $request->input('phone');
            $persona->doc = $request->input('doc');
            $persona->usuario_modificacion = Auth()->user()->id;
            $persona->updated_at = now();


            DB::beginTransaction();
            try {
                $user->save();
                $persona->save();
                DB::commit();
                return redirect('/perfil')->with('success', "Perfil editado correctamente.");
            } catch (Throwable $e) {
                report($e);
                DB::rollback();
                $request->session()->flash('error', 'Ha ocurrido un error!');
            }
        }
    }

    /**
     * Handle all users
     *
     */
    public function users()
    {
        $users = User::all()->where('deleted_at', null);
        $title = '¡Borrar Usuario!';
        $text = "¿Estás seguro que deseas borrar este usuario?";
        confirmDelete($title, $text);
        return view('auth.users', ['users' => $users]);

    }

    /**
     * Handle change User Pass
     *
     */
    public function changePass($id)
    {
        $user = User::where('id', $id)->where('deleted_at', null)->first();
        return view('auth.changePass', ['user' => $user]);
    }

    /**
     * Handle an user
     *
     */
    public function user($id)
    {

        $colleges = College::all()->where('deleted_at', null);
        $careers = Career::all()->where('deleted_at', null);
        $subjects = Subject::all()->where('deleted_at', null);
        $user = User::where('id', $id)->where('deleted_at', null)->first();
        return view('auth.user', ['user' => $user, 'colleges' => $colleges, 'careers' => $careers, 'subjects' => $subjects]);

    }

    /**
     * Handle my profile
     *
     */
    public function perfil()
    {
        $user = User::where('id', Auth::user()->id)->where('deleted_at', null)->first();
        $types = UserType::all()->sortDesc();
        return view('auth.perfil', ['user' => $user, 'types' => $types]);

    }

    /**
     * Show a persona
     *
     */
    public function verUsuario($id)
    {
        $user = User::find($id);
        $types = UserType::all()->sortDesc();
        $cargos = Cargo::all()->where('persona_id', $user->userData->id)->where('deleted_at', null);
        return view('auth.verUsuario', ['user' => $user, 'types' => $types, 'cargos' => $cargos]);
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassUpdate(ChangePassRequest $request)
    {
        if ($request->validated()) {
            $user = User::where('id', $request->input('userid'))->where('deleted_at', null)->first();
            DB::beginTransaction();
            try {
                $user->password = $request->input('password');
                $user->usuario_modificacion = Auth()->user()->id;
                $user->updated_at = now();
                $user->save();
                DB::commit();
                return redirect('/users')->with('success', "Contraseña cambiada correctamente.");
            } catch (Throwable $e) {
                report($e);
                DB::rollback();
                $request->session()->flash('error', 'Ha ocurrido un error!');
            }
        }
    }


    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function registerDoc(RegisterDocRequest $request)
    {


        $persona = Persona::find($request->edit);
        $persona->name = $request->name;
        $persona->lastname = $request->lastname;
        $persona->doc = $request->doc;
        $persona->email = $request->profesional_email;
        $persona->personal_email = $request->personal_email;
        $persona->usuario_modificacion = Auth()->user()->id;
        $persona->updated_at = now();
        DB::beginTransaction();
        $persona->save();
        DB::commit();
        DB::beginTransaction();
        try {
            $fileid = NULL;
            if ($request->file) {
                $fileModel = new File;
                $fileName = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
                $fileModel->file_path ='/storage/' . $filePath;
                $fileModel->save();
                $fileid = $fileModel->id;
            }

            $user = new User($request->validated());
            $user->persona_id = $persona->id;
            $persona->cv_id = $fileid;

            if ($request->has('admin')) {
                $persona->assignRole('admin');
            }
            if ($request->has('acaUno')) {
                $persona->assignRole('acaUno');
            }
            if ($request->has('acaDos')) {
                $persona->assignRole('acaDos');
            }
            if ($request->has('bedel')) {
                $persona->assignRole('bedel');
            }
            if ($request->has('coordinador')) {
                $persona->assignRole('coordinador');
            }
            if ($request->has('basic')) {
                $persona->assignRole('basic');
            }
            if ($request->has('profesor')) {
                $persona->assignRole('profesor');
                //ver si se guarda un cargo
                if ($request->has('Docencia')) {
                    $persona->Docencia = 'Si';
                } else {
                    $persona->Docencia = 'No';
                }
                if ($request->has('Investigacion')) {
                    $persona->Investigacion = 'Si';
                } else {
                    $persona->Investigacion = 'No';
                }
                if ($request->has('Extension')) {
                    $persona->Extension = 'Si';
                } else {
                    $persona->Extension = 'No';
                }
                if ($request->has('Gestion')) {
                    $persona->Gestion = 'Si';
                } else {
                    $persona->Gestion = 'No';
                }
                if ($request->has('cargoSwitch')) {
                    $cargo = new Cargo;
                    $cargo->persona_id = $persona->id;
                    $cargo->subject_id = $request->input('subject_id');
                    $cargo->tipo = $request->input('tipo');
                    $cargo->fecha_alta = $request->input('fecha_alta');
                    $cargo->fecha_baja = $request->input('fecha_baja');
                    $cargo->act_des = $request->input('act_des');
                    $cargo->categoria = $request->input('categoria');
                    $cargo->dedicacion_horaria = $request->input('dedicacion_horaria');
                    $cargo->status = 1;
                    $cargo->usuario_alta = Auth()->user()->id;
                    $cargo->save();

                    $alerta =new Alerta();
                    $alerta->usuario_alta = Auth()->user()->id;
                    if($request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') > date('Y-m-d')  || $request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') == null){
                        $alerta->titulo = 'Alta de nuevo Cargo';
                        $alerta->descripcion = 'Se ha dado de alta un nuevo cargo';
                    } else {
                        $alerta->titulo = 'Alta de nuevo Cargo fuera de rango de fechas';
                        $alerta->descripcion = 'Se ha dado de alta un nuevo cargo, pero fuera de rango de fechas de alta y baja del mismo';
                        $cargo->status = 0;
                        $cargo->save();
                    }

                    $alerta->tipo = 1;
                    $alerta->origen = 2;
                    $alerta->status = 2;
                    $alerta->user_id = Auth::user()->id;
                    $alerta->cargo_id = $cargo->id;
                    $alerta->materia_id = $cargo->subject_id;
                    $alerta->save();
                }

            };

            $persona->save();
            $user->save();
            DB::commit();
            if ($persona->hasRole('coordinador')) {
                return redirect()->action(
                    [CoordinadorController::class, 'show'], $user->id
                );

            } else {
                return redirect('/users')->with('success', "Usuario registrado correctamente.");
            }

        } catch (Throwable $e) {
            report($e);
            DB::rollback();
            $request->session()->flash('error', 'Ha ocurrido un error!');
        }
    }



}
