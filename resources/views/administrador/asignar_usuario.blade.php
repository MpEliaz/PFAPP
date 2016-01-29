@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alerta-pf" role="alert">{{session('success')}}</div>
            @endif        
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar responsable de parte de fuerza</div>
                    <div class="panel-body">
                    {!! Form::open(array('url' => 'usuarios/asignar', 'action' => 'post', 'class' => 'form-horizontal')) !!}
                    <div class="row">
                    <div class="col-md-6">
                    <h3 class="text-center">Usuario</h3>
                    <input type="hidden" name="id_usuario" value="{{ $usuario->id }}"></input>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Rut</label>
                            <div class="col-md-7">
                                	<p>{{ $usuario->rut }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre</label>

                            <div class="col-md-7">
                                	<p><strong>{{ $usuario->grado->sigla." ".$usuario->nombres." ".$usuario->apellido_p." ".$usuario->apellido_m }}</strong></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Unidad</label>

                            <div class="col-md-7">
                                    <p>{{$usuario->unidad->nombre}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Rol</label>

                            <div class="col-md-7">
                                	<p>{{ $usuario->rol->nombre }}</p>
                            </div>
                        </div>                   	
                    </div>                                                          
                    <div class="col-md-6">
                    <h3 class="text-center">Unidad</h3>
                        <div class="form-group{{ $errors->has('unidad_id') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                               {!! Form::select('unidad_id',$unidades,  $uni_usuario, ['class' => 'form-control', 'placeholder' => 'Selecciona Unidad']) !!}

                                @if ($errors->has('unidad_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unidad_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      	
                    </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                    	<a class="btn btn-primary btn-sm" href="{{ URL::action('UsuariosController@index') }}">Volver</a>
						<input class="btn btn-success btn-sm" type="submit" value="Asignar Unidad a Usuario"></input>
                    </div>
                    </div>
                    {!! Form::close() !!}                                                          
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection