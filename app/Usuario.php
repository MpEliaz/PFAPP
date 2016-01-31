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
        'rut', 'nombres','unidad_id', 'apellido_p', 'apellido_m', 'password', 'rol_id', 'estado', 'grado_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function nombre_completo()
    {
        return $this->nombres." ".$this->apellido_p." ".$this->apellido_m;
    }

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

    public function unidad()
    {
      return $this->hasOne('App\Models\Unidad', 'codunijic', 'unidad_id');
    }    

    public function partes_de_fuerza()
    {
      return $this->hasMany('App\Models\ParteFuerza');
    }

    public function isAdmin()
    {
        if($this->rol_id == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function isUser()
    {
        if($this->rol_id == 3){
            return true;
        }
        else{
            return false;
        }
    }

    public function unidades_asignadas()
    {
      return $this->belongsToMany('App\Models\Unidad', 'usuario_unidad', 'usuario', 'unidad')->select('codunijic', 'nombre', 'sigla');
    }
}
