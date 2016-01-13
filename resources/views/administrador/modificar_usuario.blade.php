@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Modificar usuario</div>
                    <div class="panel-body">
                        {!! Form::open(array('action' => array('UsuariosController@update', $usuario->id), 'method'=> 'PUT', 'class' => 'form-horizontal'))!!}

                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Rut</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rut" value="{{ $usuario->rut }}">

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('grado_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Grado</label>

                            <div class="col-md-6">
                               {!! Form::select('grado_id', $grados, $usuario->grado->id, ['class' => 'form-control', 'placeholder' => 'Selecciona...']) !!}

                                @if ($errors->has('grado_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grado_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombres" value="{{ $usuario->nombres }}">

                                @if ($errors->has('nombres'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido_p') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido Paterno</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="apellido_p" value="{{ $usuario->apellido_p }}">

                                @if ($errors->has('apellido_p'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido_p') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido_m') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido Materno</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="apellido_m" value="{{ $usuario->apellido_m }}">

                                @if ($errors->has('apellido_m'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido_m') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password" value="XXXXXXX">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-btn fa-reload"></i>Resetear
                                </button>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Rol</label>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="grado" value="{{ old('grado') }}"> -->
                               {!! Form::select('rol', $roles, $usuario->rol->id, ['class' => 'form-control', 'placeholder' => 'Selecciona...']) !!}

                                @if ($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                        
                                <a class="btn btn-primary" href="{{ URL::action('UsuariosController@index') }}">Ver Todos</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Guardar Cambios
                                </button>
                            </div>
                        </div>
                        </div>
                        {!! Form::close() !!}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection