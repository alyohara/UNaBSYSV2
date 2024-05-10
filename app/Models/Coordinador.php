<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class Coordinador extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tipo',
        'usuario_alta',
        'usuario_baja',
        'usuario_modificacion',
    ];

     public function user()
     {
          return $this->belongsTo(User::class, 'user_id');
     }
    public function materias()
    {
        return $this->hasMany(CoordinadorMateria::class, 'coordinador_id', 'id');
    }
    public function carreras() {
        return $this->hasMany(CoordinadorCarrera::class, 'coordinador_id', 'id');
    }
    public function deptos() {
        return $this->hasMany(CoordinadorDepto::class, 'coordinador_id', 'id');
    }
    public function carreras_by_deptos() {
         $deptos = $this->deptos;
            $carreras = [];
            foreach ($deptos as $depto) {
                $carreras = array_merge($carreras, $depto->carreras->toArray());
            }
            return $carreras;
    }
    public function materias_by_carreras(): Collection {

        $carreras = CoordinadorCarrera::where('coordinador_id', $this->id)->get();
        $materias = collect();
        foreach ($carreras as $carrera) {
            $career = Career::find($carrera->carrera_id);
            $materias = $materias->concat($career->materias);
        }
        return $materias;
    }
    public function materias_by_deptos(): Collection {

        $deptos = CoordinadorDepto::where('coordinador_id', $this->id)->get();
        $carreras = collect();
        $materias = collect();
        foreach ($deptos as $depto) {
            $college = College::find($depto->depto_id);
            $carreras = $carreras->concat($college->carreras);
        }
        foreach ($carreras as $carrera) {
            $career = Career::find($carrera['id']);
            $materias = $materias->concat($career->materias);
        }
        return $materias;

    }
    public function all_materias(): Collection{
        $uniqueMaterias = collect();
        $materias = collect($this->materias);
        foreach ($materias as $materia) {
            $subject = Subject::find($materia->materia_id);
            if (!$uniqueMaterias->contains($subject)) {
                $uniqueMaterias->push($subject);
            }
        }
        foreach ($this->materias_by_carreras() as $carrera) {
            if (!$uniqueMaterias->contains($carrera)) {
                $uniqueMaterias->push($carrera);
            }
        }
        foreach ($this->materias_by_deptos() as $depto) {
            if (!$uniqueMaterias->contains($depto)) {
                $uniqueMaterias->push($depto);
            }
        }
        return($uniqueMaterias);

    }
    public function all_cargos_by_materias(): Collection {

        $materias = $this->all_materias();
        $cargos = collect();
        foreach ($materias as $materia) {
            $cargosA = Cargo::where('subject_id', $materia->id)->where('deleted_at', null)->get();
            $cargos = $cargos->concat($cargosA);
        }
        //$cargos must not have duplicates
        $cargos = $cargos->unique('id');
        return $cargos;
    }

    public function usuarioAlta()
    {
        return $this->belongsTo(User::class, 'usuario_alta');
    }

    public function usuarioBaja()
    {
        return $this->belongsTo(User::class, 'usuario_baja');
    }

    public function usuarioModificacion()
    {
        return $this->belongsTo(User::class, 'usuario_modificacion');
    }



}
