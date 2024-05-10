<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'abrev_name',
        'type',
        'year',
        'semester',
        'credits',
        'status',
        'coordinador_id',
        'usuario_alta',
        'usuario_baja',
        'usuario_modificacion',

    ];

    /**
     * User career managment.
     *
     */
    public function carreras()
    {
        return $this->belongsToMany(Career::class, 'subject_career');
    }

    /**
     * User titular/es managment.
     *
     */
    public function titular()
    {
        return Cargo::all()->where('career_id', $this->id)->where('cargo', 'titular')->where('status', 'En Cargo');
    }

    /**
     * User cargos  managment.
     *
     */
    public function cargos()
    {

        return Cargo::all()->where('career_id', $this->id);
    }

    /**
     * User coordinador managment.
     */
    public function coordinador()
    {
        return $this->belongsTo(CoordinadorMateria::class, 'materia_id', 'id');
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
