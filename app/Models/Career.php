<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'dateInit',
        'data',
        'college_id',
        'years',
        'Codigo SIU',
        'Denominación de Carrera',
        'Título',
        'Resolución de Aprobación Consejo Superior UNAB',
        'Resolución de Correlativas Consejo Superior UNAB',
        'Resolución Ministerial',
        'coordinador_id',
        'usuario_alta',
        'usuario_modificacion',
        'usuario_baja',


    ];

    /**
     * User type managment.
     *
     */
    public function facultad()
    {
        return $this->belongsTo(College::class, 'college_id');
    }
    public function materias()
    {
        return $this->belongsToMany( Subject::class, 'subject_career');
    }
    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'coordinador_id');
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

    public function coordinadores()
    {
        return $this->hasMany(CoordinadorCarrera::class, 'carrera_id', 'id');
    }


}
