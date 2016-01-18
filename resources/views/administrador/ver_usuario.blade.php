@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Informacion del usuario</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Rut</label>
                            <div class="col-md-6">
                                	<p>{{ $usuario->rut }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                	<p><strong>{{ $usuario->grado->sigla." ".$usuario->nombres." ".$usuario->apellido_p." ".$usuario->apellido_m }}</strong></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Unidad</label>

                            <div class="col-md-6">
                                    <p>{{ $usuario->unidad_id }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Rol</label>

                            <div class="col-md-6">
                                	<p>{{ $usuario->rol->nombre }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-sm" href="{{ URL::action('UsuariosController@index') }}">Ver Todos</a>
                                <a class="btn btn-success btn-sm" href="{{ URL::action('UsuariosController@edit',['id' => $usuario->id]) }}">Modificar</a>
                            </div>
                        </div>                                                 
                                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection