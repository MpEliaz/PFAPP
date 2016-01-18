<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParteFuerza extends Model
{
	protected $table = 'parte_fuerza';

    protected $fillable = [
        'unidad_id', 
        'responsable',
        'creado_el',
        'estado',
        'fuerza_total',
		'forman_total',
		'faltan_total',
		'of_fuerza',
		'of_forman',
		'of_faltan',
		'cp_fuerza',
		'cp_forman',
		'cp_faltan',
		'sltp_fuerza',
		'sltp_forman',
		'sltp_faltan',
		'slc_fuerza',
		'slc_forman',
		'slc_faltan',
		'ec_fuerza',
		'ec_forman',
		'ec_faltan',
		'alumnos_fuerza',
		'alumnos_forman',
		'alumnos_faltan'
    ];

    public function demostracion()
    {
    	return $this->hasMany('App\Models\DetalleFaltantes', 'partefuerza_id');
    }

    public function usuario_responsable()
    {
    	$usuario = $this->belongsTo('App\Usuario', 'responsable', 'id');
		return $usuario;
    }

}
