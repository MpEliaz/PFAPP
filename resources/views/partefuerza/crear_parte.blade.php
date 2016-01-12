@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear parte de fuerza</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => 'usuarios', 'action' => 'post', 'class' => 'form-horizontal')) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td>CAT</td>
                                        <td>CANTIDAD</td> 
                                    </tr>
                                    </thead>
                                    <tr>
                                        <td>OF</td>
                                        <td>
                                            <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                                @if ($errors->has('nombres'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nombres') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </td>        
                                    </tr>  
                                    <tr>
                                        <td>CP</td>
                                        <td>
                                            <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                                @if ($errors->has('nombres'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nombres') }}</strong>
                                                </span>
                                                @endif
                                            </div>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SLTP</td>
                                        <td>
                                            <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                                @if ($errors->has('nombres'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nombres') }}</strong>
                                                </span>
                                                @endif
                                            </div>                                            
                                        </td>
                                    </tr>   
                                    <tr>
                                        <td>SLC</td>
                                        <td>
                                            <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                                @if ($errors->has('nombres'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nombres') }}</strong>
                                                </span>
                                                @endif
                                            </div>                                            
                                        </td>
                                    </tr>   
                                    <tr>
                                        <td>EC</td>
                                        <td>
                                            <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                                @if ($errors->has('nombres'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nombres') }}</strong>
                                                </span>
                                                @endif
                                            </div>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alumnos</td>
                                        <td>
                                            <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                                @if ($errors->has('nombres'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nombres') }}</strong>
                                                </span>
                                                @endif
                                            </div>                                            
                                        </td>
                                    </tr>                                       
                                </table>
                                
                            </div>    
                            <div class="col-md-7">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>    
                        </div>

                        {!! Form::close() !!}                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection