<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	protected $table = 'roles';

    protected $fillable = [
        'nombre', 'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

}
