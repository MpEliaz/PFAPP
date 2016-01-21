@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar responsable de parte de fuerza</div>
                    <div class="panel-body">
                    {!! Form::open(array('url' => 'usuarios/asignar', 'action' => 'post', 'class' => 'form-horizontal')) !!}
                    <div class="row">
                    <div class="col-md-6">
                    <h3 class="text-center">Usuario</h3>
                        <div class="form-group{{ $errors->has('unidad_id') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                               {!! Form::select('id_usuario', $usuarios, null, ['class' => 'form-control', 'placeholder' => 'Selecciona...']) !!}

                                @if ($errors->has('unidad_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unidad_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      	
                    </div>                                                         
                    <div class="col-md-6">
                    <h3 class="text-center">Unidad</h3>
                        <div class="form-group{{ $errors->has('unidad_id') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                               {!! Form::select('unidad_id', $unidades, null, ['class' => 'form-control', 'placeholder' => 'Selecciona...']) !!}

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