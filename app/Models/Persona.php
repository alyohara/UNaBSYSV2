<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Persona extends Model
{
    use HasFactory;
    use HasRoles;
    protected $guard = 'web ';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'birth',
        'gender',
        'phone',
        'email',
        'personal_email',
        'doc',
        'userType_id',
        'cv_id',
        'Docencia',
        'Investigacion',
        'Extension',
        'Gestion',
        'diplomatura',
        'area',
        'usuario_alta',
        'usuario_baja',
        'usuario_modificacion',

    ];

    /**
     * User type managment.
     *
     */
    public function tipo()
    {
        return $this->belongsTo(UserType::class,'userType_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'persona_id', 'id');
    }
    public function curriculum(){
        return$this->hasOne(File::class, 'id', 'cv_id');
    }

    public function nuevoDocente()
    {
        // this function returns true if the persona was created in the last two months
        $fecha = date('Y-m-d', strtotime('-2 months'));
        return $this->created_at > $fecha;
    }

    public function badgeNuevo(){
        if($this->nuevoDocente()){

            return '<span class="badge badge-pill badge-danger" style="color: orangered">Nuevo</span>';
        }
        return '';
    }
}
