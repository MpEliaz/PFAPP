<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
	protected $table = 'unidades';
	protected $primaryKey = 'codunijic';
	public $incrementing = false; 

    // protected $fillable = [
    //     'nombre', 'estado'
    // ];

    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario', 'usuario_unidad', 'unidad', 'usuario');
    }


}