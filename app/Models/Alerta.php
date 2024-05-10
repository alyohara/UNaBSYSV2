<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'origen',
        'status',
        'user_id',
        'cargo_id',
        'materia_id',
        'usuario_alta',
        'usuario_baja',
        'usuario_modificacion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
    public function materia()
    {
        return $this->belongsTo(Subject::class, 'materia_id');
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
