<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaRequest;
use App\Models\Alerta;
use App\Models\Career;
use App\Models\Cargo;
use App\Models\College;
use App\Models\File;
use App\Models\Persona;
use App\Models\Subject;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PersonaController extends Controller
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
    public function store(PersonaRequest $request)
    {

        if ($request->edit) {

            // si es docente actualizo los datos de la persona
            $validated = $request->validate([
                'email' => 'required|email:rfc,dns|unique:personas,email,' . $request->input('edit'),
                'name' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'birth' => 'required|date',
                'gender' => 'required',
                'phone' => 'required',
                'doc' => 'required',
                'file' => 'mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png,tiff|max:12048'
            ]);
            if ($validated) {
                $persona = Persona::find($request->edit);
                $persona->name = $request->input('name');
                $persona->lastname = $request->input('lastname');
                $persona->address = $request->input('address');
                $persona->birth = $request->input('birth');
                $persona->gender = $request->input('gender');
                $persona->phone = $request->input('phone');
                $persona->doc = $request->input('doc');
                $persona->email = $request->input('email');
                $persona->personal_email = $request->input('personal_email');
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
                $persona->diplomatura = $request->input('diplomatura');
                $persona->area = $request->input('area');

                if ($request->file) {
                    $fileModel = new File;
                    $fileName = time() . '_' . $request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                    $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
                    $fileModel->file_path = '/storage/' . $filePath;
                    $fileModel->save();
                    $persona->cv_id = $fileModel->id;
                }


                DB::beginTransaction();
                try {
                    $persona->assignRole('profesor');
                    $persona->usario_modificacion = Auth::user()->id;
                    $persona->updated_at = now();
                    $persona->save();
                    if ($request->has('cargoSwitch')) {

                        $cargos = json_decode($request->input('cargos'));

                        foreach ($cargos as $cargoH) {
                            $cargo = new Cargo;
                            $cargo->persona_id = $persona->id;
                            $cargo->subject_id = $cargoH->subject_id;
                            $cargo->tipo = $cargoH->tipo;
                            $cargo->fecha_alta = $cargoH->fecha_alta;
                            $cargo->fecha_baja = NULL;
                            if ($cargoH->fecha_baja != null) {
                                $cargo->fecha_baja = $cargoH->fecha_baja;
                            }

                            $cargo->act_des = $cargoH->act_des;
                            $cargo->categoria = $cargoH->categoria;
                            $cargo->dedicacion_horaria = $cargoH->dedicacion_horaria;
                            $cargo->status = 1;
                            $cargo->usuario_alta = Auth::user()->id;
                            $cargo->save();

                            $alerta = new Alerta();
                            $alerta->usuario_alta = Auth::user()->id;
                            if ($request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') > date('Y-m-d') || $request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') == null) {
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


                    }
                    DB::commit();
                    return redirect('/personas')->with('success', "Docente Editado correctamente.");
                } catch (Throwable $e) {
                    report($e);
                    DB::rollback();
                    $request->session()->flash('error', 'Ha ocurrido un error!');
                }
            }
        } else {
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
                $persona = Persona::create($request->validated());
                $persona->usuario_alta = Auth::user()->id;
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
                $persona->diplomatura = $request->input('diplomatura');
                $persona->area = $request->input('area');

                $persona->cv_id = $fileid;
                $persona->save();
                if ($request->has('cargoSwitch')) {
                    $cargos = json_decode($request->input('cargos'));

                    foreach ($cargos as $cargoH) {
                        $cargo = new Cargo;
                        $cargo->persona_id = $persona->id;
                        $cargo->subject_id = $cargoH->subject_id;
                        $cargo->tipo = $cargoH->tipo;
                        $cargo->fecha_alta = $cargoH->fecha_alta;
                        $cargo->fecha_baja = NULL;
                        if ($cargoH->fecha_baja != null) {
                            $cargo->fecha_baja = $cargoH->fecha_baja;
                        }
                        $cargo->act_des = $cargoH->act_des;
                        $cargo->categoria = $cargoH->categoria;
                        $cargo->dedicacion_horaria = $cargoH->dedicacion_horaria;
                        $cargo->status = 1;
                        $cargo->usuario_alta = Auth::user()->id;
                        $cargo->save();

                        $alerta = new Alerta();
                        $alerta->usuario_alta = Auth::user()->id;
                        if ($request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') > date('Y-m-d') || $request->input('fecha_alta') < date('Y-m-d') && $request->input('fecha_baja') == null) {
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
                }
                DB::commit();
                return redirect('/personas')->with('success', "Docente registrada correctamente.");
            } catch (Throwable $e) {
                report($e);
                DB::rollback();
                $request->session()->flash('error', 'Ha ocurrido un error!');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        $types = UserType::all()->where('deleted_at', null)->sortDesc();
        $colleges = College::all()->where('deleted_at', null);
        $carreras = Career::all()->where('deleted_at', null);
        $materias = Subject::all()->where('deleted_at', null);
        return view('auth.persona.register', ['types' => $types, 'colleges' => $colleges, 'carreras' => $carreras, 'materias' => $materias, 'persona' => $persona]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns|unique:personas,email,' . $request->input('persona_id'),
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'birth' => 'required|date',
            'gender' => 'required',
            'phone' => 'required',
            'doc' => 'required',
            'file' => 'mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png,tiff|max:12048'
        ]);
        if ($validated) {

            $persona = Persona::find($request->input('persona_id'));
            $persona->usuario_modificacion = Auth()->user()->id;
            $persona->updated_at = now();
            $persona->name = $request->input('name');
            $persona->lastname = $request->input('lastname');
            $persona->address = $request->input('address');
            $persona->birth = $request->input('birth');
            $persona->gender = $request->input('gender');
            $persona->phone = $request->input('phone');
            $persona->doc = $request->input('doc');
            $persona->email = $request->input('email');
            $persona->personal_email = $request->input('personal_email');
            $persona->diplomatura = $request->input('diplomatura');
            $persona->area = $request->input('area');
            if ($request->file) {


                $fileModel = new File;
                $fileName = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
                $persona->cv_id = $fileModel->id;
            }
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

            DB::beginTransaction();
            try {
                $persona->save();
                DB::commit();
                return redirect('/personas')->with('success', "Persona Editada correctamente.");
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
     * @param \App\Models\Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::where('id', $id)->where('deleted_at', null)->first();
        $persona->deleted_at = now();
        $persona->usuario_baja = Auth()->user()->id;
        $persona->save();
        return redirect('/personas')->with('success', "Persona Eliminada correctamente.");
    }

    /**
     * Handle all personas
     *
     */
    public function personas()
    {
        $personas = Persona::where('deleted_at', null)->get();
        //filter by role as 'profesor'
        $personas = $personas->filter(function ($persona) {
            return $persona->hasRole('profesor');
        });
        $title = '¡Borrar Persona!';
        $text = "¿Estás seguro que deseas borrar estos datos?";
        confirmDelete($title, $text);
        return view('auth.persona.personas', ['personas' => $personas]);

    }

    /**
     * Handle a persona
     *
     */
    public function persona($id)
    {
        $persona = Persona::where('deleted_at', null)->where('id', $id)->first();
        if ($persona->hasRole('profesor')) {
            $types = UserType::all()->sortDesc();
            $carreras = Career::all()->where('deleted_at', null);
            $materias = Subject::all()->where('deleted_at', null);
            return view('auth.persona.persona', ['persona' => $persona, 'types' => $types, 'carreras' => $carreras, 'materias' => $materias]);
        }
        return view('/');


    }

    /**
     * Show a persona
     *
     */
    public function verPersona($id)
    {
        $persona = Persona::find($id);
        if ($persona->hasRole('profesor')) {
            $types = UserType::all()->sortDesc();
            $carreras = Career::all();
            $materias = Subject::all();
            $cargos = Cargo::all()->where('persona_id', $persona->id);
            return view('auth.persona.verPersona', ['persona' => $persona, 'types' => $types, 'cargos' => $cargos, 'carreras' => $carreras, 'materias' => $materias]);
        }
        return view('/');


    }
    public function verPersonaNotDocOnly($id)
    {
        $persona = Persona::find($id);

            $types = UserType::all()->sortDesc();
            $carreras = Career::all();
            $materias = Subject::all();
            $cargos = Cargo::all()->where('persona_id', $persona->id);
            return view('auth.persona.verPersona', ['persona' => $persona, 'types' => $types, 'cargos' => $cargos, 'carreras' => $carreras, 'materias' => $materias]);



    }

}
