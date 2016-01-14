<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut', 'nombres', 'apellido_p', 'apellido_m', 'password', 'rol_id', 'estado', 'grado_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grado()
    {
        return $this->hasOne('App\Models\Grado','id', 'grado_id');
    }

    public function rol()
    {
        return $this->hasOne('App\Models\Rol','id', 'rol_id');
    }

    public function getId()
    {
      return $this->id;
    }
}
