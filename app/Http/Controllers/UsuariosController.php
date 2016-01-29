<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Models\Grado;
use App\Models\Unidad;
use App\Models\Rol;
use App\Http\Requests\UsuarioForm;

class UsuariosController extends Controller
{
    public function __construct()
    {
/*        $this->middleware('auth');*/
        $this->middleware('admin', ['only' => [ 
             'guardar_asignado',
             'asignar',
             'asignar_unidad',
             'edit',
             'show'
         ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with('grado')->with('rol')

        ->with(array('unidad'=>function($query){
            $query->select('codunijic', 'nombre', 'sigla');
        }))
        ->with(array('unidades_asignadas'=>function($query){
            $query->select('codunijic', 'sigla', 'nombre');
        }))->get();

        //return $usuarios;
        return view('administrador.usuarios',['usuarios'=> $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::lists('nombre', 'id');
        $roles = Rol::lists('nombre', 'id');
        $unidades = Unidad::where('estado','=', '1')->lists('nombre','codunijic');
        return view("administrador.crear_usuario", ['grados' => $grados, 'roles' => $roles, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioForm $usuario)
    {
       $user = new Usuario([
        'rut' => $usuario->rut,
        'unidad_id' => $usuario->unidad_id,
        'nombres' => $usuario->nombres,
        'apellido_p' => $usuario->apellido_p,
        'apellido_m' => $usuario->apellido_m,
        'password' => bcrypt($usuario->password),
        'rol_id' => (int)$usuario->rol,
        'grado_id' => (int)$usuario->grado_id,
        'estado' => 0,
    ]);     
        $id = $user->save();
        return redirect()->action('UsuariosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->grado;
        $usuario->rol;
        $usuario->unidad;

        //return response()->json($usuario);
        return view('administrador.ver_usuario',['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $usuario->grado;

        $grados = Grado::lists('nombre', 'id');
        $roles = Rol::lists('nombre', 'id');
        $unidades = Unidad::where('estado','=', '1')->lists('nombre','codunijic');

        if($usuario != null){
            return view('administrador.modificar_usuario')->with(['usuario' => Usuario::find($id), 'grados'=> $grados, 'roles'=> $roles, 'unidades' => $unidades]);
        }
        else{
            return "usuario no existe";
        }
        //return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioForm $usuario, $id)
    {
        $user = Usuario::findOrFail($id);

        if(isset($user)){

            $user->rut = $usuario->rut;
            $user->unidad_id = $usuario->unidad_id;
            $user->nombres = $usuario->nombres;
            $user->apellido_p = $usuario->apellido_p;
            $user->apellido_m = $usuario->apellido_m;
            //$user->password = bcrypt($usuario->password);
            $user->rol_id = (int)$usuario->rol;
            $user->grado_id = (int)$usuario->grado_id;

            $user->save();
        }
        return redirect()->action('UsuariosController@show', ['id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($request->ajax()) {
                // $user = Usuario::findOrFail($request->id);
            return "HOLII";
                // if(isset($user)){
                //     //return response()->json('{"id":'.$user->id.', "estado":'.$user->estado.', "err":"false"}');
                //     return "ESTOY CASI";
                // }
        }        
    }

    public function cambiar_estado(Request $request)
    {
        if($request->ajax()) {
              $user = Usuario::findOrFail($request->id);

              if(isset($user)){

                if($user->estado == 1){

                    $user->estado = 0;
                    $user->save();

                }elseif ($user->estado == 0) {
                    $user->estado = 1;
                    $user->save();
                }

                return response()->json('{"id":'.$user->id.', "estado":'.$user->estado.', "err":"false"}');
              }
        }
    }

    public function asignar_unidad($id)
    {
        $user = Usuario::findOrFail($id);
        $user->unidades_asignadas;
        $unidad = ($user->unidades_asignadas->isEmpty()) ? "" : $user->unidades_asignadas[0]->codunijic;

        $unidades = Unidad::where('estado','=', '1')->lists('nombre','codunijic');

        return view('administrador.asignar_usuario',['usuario' => $user, 'uni_usuario' => $unidad, 'unidades' => $unidades]);
    }

     public function asignar()
    {
        $usuarios = Usuario::lists('nombres', 'id');
        //$usuarios = Usuario::wherenotIn('unidades_asignadas');
        //return $usuarios;
        $unidades = Unidad::where('estado','=', '1')->lists('nombre','codunijic');

        $usuarios_con_unidad = Usuario::has('unidades_asignadas')->get();
        //return $usuarios_unidad;
        return view('administrador.asignar',['usuarios' => $usuarios,'usuarios_unidad'=>$usuarios_con_unidad, 'unidades' => $unidades]);
        //return $usuarios_unidad;
    }

    public function guardar_asignado(Request $request)
    {
        $id_usuario = $request->id_usuario;
        $id_unidad  =$request->unidad_id;
        
        if($id_usuario!="" && $id_unidad!=""){

        $u = Usuario::findOrFail($id_usuario);
        $u->unidades_asignadas()->attach($id_unidad);

            return redirect()->action('UsuariosController@asignar')->with('success','El usuario ah sido asignado a la unidad.');
        }
        else{
            return redirect()->action('UsuariosController@asignar');
        }
    }

    public function eliminar_usuario_asignado(Request $request)
    {
        $id_usuario = $request->id;
        $u = Usuario::findOrFail($id_usuario);
        $u->unidades_asignadas()->detach();

        return response()->json('{"err":"false"}');

    }

    public function ver_usuarios_asignados()
    {
      $usuarios = Usuario::has('unidades_asignadas')->get();
        return view('administrador.ver_usuarios_asignados',['usuarios' => $usuarios]);
    }



}
