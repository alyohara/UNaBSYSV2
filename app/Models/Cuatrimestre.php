<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuatrimestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'fecha_creacion',
        'fecha_actualizacion',
        'fecha_eliminacion',
        'usuario_creacion',
        'usuario_actualizacion',
        'usuario_eliminacion'
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'usuario_creacion');
    }

    public function actualizador()
    {
        return $this->belongsTo(User::class, 'usuario_actualizacion');
    }

    public function eliminador()
    {
        return $this->belongsTo(User::class, 'usuario_eliminacion');
    }

    public function scopeCurrent($query)
    {
        return $query->where('fecha_inicio', '<=', now())
            ->where('fecha_fin', '>=', now())->where('estado', 'active')->where('fecha_eliminacion', null);
    }

}
