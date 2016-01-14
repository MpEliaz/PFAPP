<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleFaltantes extends Model
{
	protected $table = 'detalle_fza_faltante';

    protected $fillable = [
        'cantidad', 'partefuerza_id', 'motivo_id'
    ];


    public function parte_fuerza()
    {
        return $this->belongsTo('App\Models\ParteFuerza');
    }

    public function motivo()
    {
    	return $this->hasOne('App\Models\Motivo');
    }

}
