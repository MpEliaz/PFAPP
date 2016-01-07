<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
	protected $table = 'grados';

    protected $fillable = [
        'nombre', 'sigla'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

}
