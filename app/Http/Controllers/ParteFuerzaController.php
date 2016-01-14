<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Motivo;
use App\Models\ParteFuerza;
use App\Models\DetalleFaltantes;
use App\Http\Requests\ParteFuerzaRequest;
use Carbon\Carbon;

class ParteFuerzaController extends Controller
{
    // protected $auth;
    // protected $currentUser;

    // public function __construct(Guard $auth)
    // {
    //     $this->auth = $auth;
    //     $this->currentUser = $this->auth->user();
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parte = ParteFuerza::find(4);

        $parte->demostracion;

        return $parte;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motivos = Motivo::lists('motivo', 'id');
        return view('partefuerza.crear_parte', ['motivos' => $motivos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParteFuerzaRequest $r)
    {
        $parte = new ParteFuerza([

            'unidad_id'     => null,
            'responsable'   => Auth::user()->id,
            'creado_el'     => Carbon::now(),
            'estado'        => 1,
            'of_fuerza'     => (int)$r->of_fuerza,
            'of_forman'     => (int)$r->of_forman,
            'of_faltan'     => (int)$r->of_faltan,
            'cp_fuerza'     => (int)$r->cp_fuerza,
            'cp_forman'     => (int)$r->cp_forman,
            'cp_faltan'     => (int)$r->cp_faltan,
            'sltp_fuerza'   => (int)$r->sltp_fuerza,
            'sltp_forman'   => (int)$r->sltp_forman,
            'sltp_faltan'   => (int)$r->sltp_faltan,
            'slc_fuerza'    => (int)$r->slc_fuerza,
            'slc_forman'    => (int)$r->slc_forman,
            'slc_faltan'    => (int)$r->slc_faltan,
            'ec_fuerza'     => (int)$r->ec_fuerza,
            'ec_forman'     => (int)$r->ec_forman,
            'ec_faltan'     => (int)$r->ec_faltan,
            'alumnos_fuerza'=> (int)$r->alumnos_fuerza,
            'alumnos_forman'=> (int)$r->alumnos_forman,
            'alumnos_faltan'=> (int)$r->alumnos_faltan,
            'fuerza_total'  => (int)$r->of_fuerza+(int)$r->cp_fuerza+(int)$r->sltp_fuerza+(int)$r->slc_fuerza+(int)$r->ec_fuerza+(int)$r->alumnos_fuerza,
            'forman_total'  => (int)$r->of_forman+(int)$r->cp_forman+(int)$r->sltp_forman+(int)$r->slc_forman+(int)$r->ec_forman+(int)$r->alumnos_forman,
            'faltan_total'  => (int)$r->of_faltan+(int)$r->cp_faltan+(int)$r->sltp_faltan+(int)$r->slc_faltan+(int)$r->ec_faltan+(int)$r->alumnos_faltan,
        ]);
        
        $parte->save();

        $cantidad = $r->cantidad;
        $motivo = $r->motivos;

        if(isset($cantidad))
        {
            foreach ($cantidad as $key => $cant) {

              $detail = new DetalleFaltantes();
              $detail->cantidad = (int)$cant;
              $detail->partefuerza_id = (int)$parte->id;
              $detail->motivo_id = (int)$motivo[$key];
              $detail->save();
            
            }
        }

        return $parte;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
