@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
