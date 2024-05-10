<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject_id',
        'persona_id',
        'status',
        'cargo',
        'tipo',
        'categoria',
        'dedicacion_horaria',
        'observaciones',
        'fecha_alta',
        'fecha_baja',
        'act_des',
        'renovado',
        'fecha_renovacion',
        'cargo_anterior_id',
        'persona_que_lo_renovo_id',
        'fecha_validacion',
        'persona_que_lo_valido_id',
        'observaciones_renovacion',
        'usuario_alta',
        'usuario_baja',
        'usuario_modificacion',
    ];

    /**
     * User profesor managment.
     *
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    /**
     * User persona_que_lo_renovo.
     *
     */
    public function persona_que_lo_renovo()
    {
        return $this->belongsTo(User::class, 'persona_que_lo_renovo_id');
    }

    /**
     * User subject managment.
     *
     */
    public function materia()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function cargoAnterior()
    {
        return $this->belongsTo(Cargo::class, 'cargo_anterior_id');
    }

    public function personaQueLoValido()
    {
        return $this->belongsTo(User::class, 'persona_que_lo_valido_id');
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
