<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'email',
        'dateInit',
        'data',
        'phone',
        'website',
        'coordinador_id',
        'tipo_de_sede',
        'usuario_alta',
        'usuario_baja',
        'usuario_modificacion',
    ];

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'coordinador_id');
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
