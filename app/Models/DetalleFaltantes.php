<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleFaltantes extends Model
{
	protected $table = 'detalle_fza_faltante';

    protected $fillable = [
        'cantidad', 'partefuerza_id', 'motivo_id'
    ];


    public function motivo()
    {
    	return $this->belongsTo('App\Models\Motivo');
    }

}
