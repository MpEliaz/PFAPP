@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear parte de fuerza</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td><strong>CATEGORIA</strong></td>
                                        <td style="width:20%"><strong>FUERZA</strong></td> 
                                        <td style="width:20%"><strong>FORMAN</strong></td>
                                        <td style="width:20%"><strong>FALTAN</strong></td>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <td>Oficiales</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                            @if ($errors->has('nombres'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombres') }}</strong>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>        
                                    </tr>  
                                    <tr>
                                        <td>Cuadro Permanente</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                            @if ($errors->has('nombres'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombres') }}</strong>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td>Soldados de tropa Profesional</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                            @if ($errors->has('nombres'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombres') }}</strong>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>   
                                    </tr>   
                                    <tr>
                                        <td>Soldados Conscriptos</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                            @if ($errors->has('nombres'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombres') }}</strong>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>   
                                    </tr>   
                                    <tr>
                                        <td>Empleados Civiles</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                            @if ($errors->has('nombres'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombres') }}</strong>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td>Alumnos</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                            @if ($errors->has('nombres'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombres') }}</strong>
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf" name="nombres" value="{{ old('nombres') }}">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>TOTAL</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong id="fuerza_total">4</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong id="forman_total">5</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong id="faltan_total">5</strong>
                                        </td>
                                    </tr>                                       
                                </table>
                            </div>    
                            <div class="col-md-7">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Demostracion</div>
                                    <div class="panel-body">
                                    <div class="form-group row">
                                    <span class="col-md-3 control-label">Agregar Motivo</span>
                                            <div class="col-md-2">
                                                <input type="number" min="0" class="form-control input-pf" name="demo-cant" value="{{ old('nombres') }}">
                                            </div>
                                            <div class="col-md-4">
                                                {!! Form::select('motivo', $motivos, null, ['class' => 'form-control', 'placeholder' => 'Selecciona motivo']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success">Agregar</button>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td style="width:20%"><strong>CANTIDAD</strong></td>
                                            <td style="width:60%"><strong>MOTIVO</strong></td>
                                            <td style="width:20%"><strong></strong></td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-hover">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-8">
                                <div class="form-inline">
                                    <button class="btn btn-danger">Cancelar</button>
                                    <button class="btn btn-success">Guardar Parte</button>
                                </div>
                            </div>
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection