<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultadRequest;
use App\Models\Career;
use App\Models\College;
use App\Models\CoordinadorDepto;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;

class CollegeController extends Controller
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
    public function store(FacultadRequest $request)
    {
        DB::beginTransaction();
        try {
            if($request->validated()) {

                $college = new College();
                $college->name = $request->input('name');
                $college->address = $request->input('address');
                $college->email = $request->input('email');
                $college->dateInit = $request->input('dateInit');
                $college->phone = $request->input('phone');
                $college->website = $request->input('website');
                $college->tipo_de_sede = $request->input('tipo_de_sede');
                $college->usuario_alta = Auth()->user()->id;

                $college->save();


                if ($request->has('coordinador_id')) {

                    foreach ($request->input('coordinador_id') as $item) {
                        $coordepto = new CoordinadorDepto();
                        $coordepto->coordinador_id = $item;
                        $coordepto->depto_id = $college->id;

                        $coordepto->save();
                    }
                }
                DB::commit();
                return redirect('/facultades')->with('success', "Departamento registrado correctamente.");
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
     * @param \App\Models\College $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        $coords = Persona::with("roles")->whereHas("roles", function ($q) {
            $q->whereIn("name", ['coordinador']);
        })->where('deleted_at', null)->get();

        return view('auth.college.register', compact('coords', 'coords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\College $college
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\College $college
     * @return \Illuminate\Http\Response
     */
    public function update(FacultadRequest $request, College $college)
    {

        if ($request->validated()) {

            $facultad = College::where('id', $request->input('college_id'))->where('deleted_at', null)->first();
            $facultad->name = $request->input('name');
            $facultad->address = $request->input('address');
            $facultad->email = $request->input('email');
            $facultad->dateInit = $request->input('dateInit');
            $facultad->data = '';
            $facultad->data = $request->input('data');
            $facultad->usuario_modificacion = Auth()->user()->id;
            $facultad->updated_at = now();

            DB::beginTransaction();
            try {
                $facultad->save();
                CoordinadorDepto::where('depto_id', $facultad->id)->delete();
                if ($request->has('coordinador_id')) {

                    foreach ($request->input('coordinador_id') as $item) {
                        $coordepto = new CoordinadorDepto();
                        $coordepto->coordinador_id = $item;
                        $coordepto->depto_id = $facultad->id;

                        $coordepto->save();
                    }
                }
                DB::commit();
                return redirect('/facultades')->with('success', "Sede Editada correctamente.");
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
     * @param \App\Models\College $college
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::where('deleted_at', null)->where('id', $id)->first();
        $college->deleted_at = now();
        $college->usuario_baja = Auth()->user()->id;
        $college->save();
        return redirect('/facultades')->with('success', "Sede Eliminada correctamente.");
    }

    /**
     * Handle all colleges
     *
     */
    public function colleges()
    {
        $colleges = College::all()->where('deleted_at', null);
        $title = '¡Borrar Departamento!';
        $text = "¿Estás seguro que deseas borrar este departamento?";
        confirmDelete($title, $text);
        return view('auth.college.colleges', ['colleges' => $colleges]);

    }

    /**
     * Handle a college
     *
     */
    public function college($id)
    {
        $college = College::where('id', $id)->where('deleted_at', null)->first();
        $coords = Persona::with("roles")->whereHas("roles", function ($q) {
            $q->whereIn("name", ['coordinador']);
        })->where('deleted_at', null)->get();
        $coordsdeptos = CoordinadorDepto::where('depto_id', $id)->get();
        return view('auth.college.college', ['college' => $college, 'coords' => $coords, 'coordsdeptos' => $coordsdeptos]);
    }
    /**
     * view a college
     *
     */
    public function verFacultad($id)
    {
        $college = College::where('id', $id)->where('deleted_at', null)->first();
        $careers = Career::all()->where('college_id', $id)->where('deleted_at', null);
        $coords = CoordinadorDepto::where('depto_id', $id)->get();
        return view('auth.college.verFacultad', ['college' => $college, 'careers' => $careers, 'coords' => $coords]);
    }
}
