<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
	protected $table = 'motivos';

    protected $fillable = [
        'motivo', 'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

}
