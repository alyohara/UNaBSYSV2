<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'profesor_id',
        'bedel_id',
        'subject_id',
        'status',
        'fecha',
        'fecha_inicio',
        'fecha_fin',
        'tipo',
        'sede_de_cursada',
        'usuario_alta',
        'usuario_modificacion',
        'usuario_baja',

    ];
    public function profesor()
    {
        return $this->belongsTo(Persona::class, 'profesor_id');
    }
    public function bedel()
    {
        return $this->belongsTo(Persona::class, 'bedel_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function usuarioAlta()
    {
        return $this->belongsTo(User::class, 'usuario_alta');
    }
    public function usuarioModificacion()
    {
        return $this->belongsTo(User::class, 'usuario_modificacion');
    }
    public function usuarioBaja()
    {
        return $this->belongsTo(User::class, 'usuario_baja');
    }
    public function sede()
    {
        return $this->belongsTo(SedeDeCursada::class, 'sede_de_cursada');
    }

}
