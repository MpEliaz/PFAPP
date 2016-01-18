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
        $partes = ParteFuerza::with('usuario_responsable.grado')->with('demostracion.motivo')->orderBy('id','desc')->get();
        //return $partes;
        return view('partefuerza.index',['partes'=> $partes]);

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

        return redirect()->action('ParteFuerzaController@index');
        
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
        $parte = ParteFuerza::findOrFail($id);
        $parte->demostracion;

        foreach($parte->demostracion as $d){

            $d->motivo;
        }

        $motivos = Motivo::lists('motivo', 'id');
        //return $parte;
        return view('partefuerza.modificar_parte',['parte'=> $parte, 'motivos' => $motivos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParteFuerzaRequest $request, $id)
    {
        $parte = ParteFuerza::findOrFail($id);
        $parte->demostracion;
        if(isset($parte)){

            $parte->of_fuerza = (int)$request->of_fuerza;
            $parte->of_forman = (int)$request->of_forman;
            $parte->of_faltan = (int)$request->of_faltan;
            $parte->cp_fuerza = (int)$request->cp_fuerza;
            $parte->cp_forman = (int)$request->cp_forman;
            $parte->cp_faltan = (int)$request->cp_faltan;
            $parte->sltp_fuerza = (int)$request->sltp_fuerza;
            $parte->sltp_forman = (int)$request->sltp_forman;
            $parte->sltp_faltan = (int)$request->sltp_faltan;
            $parte->slc_fuerza = (int)$request->slc_fuerza;
            $parte->slc_forman = (int)$request->slc_forman;
            $parte->slc_faltan = (int)$request->slc_faltan;
            $parte->ec_fuerza = (int)$request->ec_fuerza;
            $parte->ec_forman = (int)$request->ec_forman;
            $parte->ec_faltan = (int)$request->ec_faltan;
            $parte->alumnos_fuerza = (int)$request->alumnos_fuerza;
            $parte->alumnos_forman = (int)$request->alumnos_forman;
            $parte->alumnos_faltan = (int)$request->alumnos_faltan;
            $parte->fuerza_total = (int)$request->of_fuerza+(int)$request->cp_fuerza+(int)$request->sltp_fuerza+(int)$request->slc_fuerza+(int)$request->ec_fuerza+(int)$request->alumnos_fuerza;
            $parte->forman_total = (int)$request->of_forman+(int)$request->cp_forman+(int)$request->sltp_forman+(int)$request->slc_forman+(int)$request->ec_forman+(int)$request->alumnos_forman;
            $parte->faltan_total = (int)$request->of_faltan+(int)$request->cp_faltan+(int)$request->sltp_faltan+(int)$request->slc_faltan+(int)$request->ec_faltan+(int)$request->alumnos_faltan;
        }
        $demostracion = [];

        foreach($request->cantidad as $key => $value){
            $demostracion = ['id' => $request->ids[$key], 'cantidad' => $request->cantidad[$key], 'motivo' => $request->motivos[$key]];
        }

        for( $i=0; $i < $parte->demostracion; $i++){
            if($parte->demostracion[i]->id == $demostracion[i]->id){
                $parte->demostracion[i]->cantidad = $demostracion[i]->cantidad;
            }
        }

        return $demostracion;

        return $parte;
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
