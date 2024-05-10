<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'persona_id',
        'usuario_alta',
        'usuario_baja',
        'usuario_modificacion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }



    /**
     * Persona Related managment.
     *
     */
    public function userData()
    {
        return $this->hasOne(Persona::class,'id', 'persona_id');
    }

    public function usuarioAlta()
    {
        return $this->hasOne(Persona::class,'id', 'usuario_alta');
    }

    public function usuarioBaja()
    {
        return $this->hasOne(Persona::class,'id', 'usuario_baja');
    }

    public function usuarioModificacion()
    {
        return $this->hasOne(Persona::class,'id', 'usuario_modificacion');
    }

}
