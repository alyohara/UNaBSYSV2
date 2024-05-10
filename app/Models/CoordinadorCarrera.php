<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinadorCarrera extends Model
{
    use HasFactory;
    protected $fillable = [
        'coordinador_id',
        'carrera_id',
    ];

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'coordinador_id');
    }
    public function carrera()
    {
        return $this->belongsTo(Career::class, 'carrera_id');
    }
}
