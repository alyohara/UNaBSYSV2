<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedeDeCursada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'usuario_alta',
        'usuario_modificacion',
        'usuario_baja',
    ];

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
