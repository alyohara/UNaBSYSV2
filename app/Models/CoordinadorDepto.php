<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinadorDepto extends Model
{
    use HasFactory;
    protected $fillable = [
        'coordinador_id',
        'depto_id',
    ];

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'coordinador_id');
    }
    public function depto()
    {
        return $this->belongsTo(College::class, 'depto_id');
    }

}
