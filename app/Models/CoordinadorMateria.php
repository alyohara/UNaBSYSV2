<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinadorMateria extends Model
{
    use HasFactory;
    protected $fillable = [
        'coordinador_id',
        'materia_id',
    ];

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'coordinador_id');
    }
    public function materia()
    {
        return $this->belongsTo(Subject::class, 'materia_id');
    }
}
