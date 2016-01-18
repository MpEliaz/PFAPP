@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear nuevo usuario</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => 'usuarios', 'action' => 'post', 'class' => 'form-horizontal')) !!}

                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Rut</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rut" value="{{ old('rut') }}">

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
                                <!-- <input type="text" class="form-control" name="grado" value="{{ old('grado') }}"> -->
                               {!! Form::select('grado_id', $grados, null, ['class' => 'form-control', 'placeholder' => 'Selecciona...']) !!}

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
                                <input type="text" class="form-control" name="nombres" value="{{ old('nombres') }}">

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
                                <input type="text" class="form-control" name="apellido_p" value="{{ old('apellido_p') }}">

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
                                <input type="text" class="form-control" name="apellido_m" value="{{ old('apellido_m') }}">

                                @if ($errors->has('apellido_m'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido_m') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('unidad_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Unidad</label>

                            <div class="col-md-6">
                               {!! Form::select('unidad_id', $unidades, null, ['class' => 'form-control', 'placeholder' => 'Selecciona...']) !!}

                                @if ($errors->has('unidad_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unidad_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                               

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-reload"></i>Generar
                                </button>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Rol</label>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="grado" value="{{ old('grado') }}"> -->
                               {!! Form::select('rol', $roles, null, ['class' => 'form-control', 'placeholder' => 'Selecciona...']) !!}

                                @if ($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a class="btn btn-primary" href="{{ URL::action('UsuariosController@index') }}">Volver</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Registrar
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