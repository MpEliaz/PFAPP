@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(session('success'))
                    <div class="alert alert-success alerta-pf" role="alert">{{session('success')}}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alerta-pf" role="alert">{{session('error')}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar responsable de parte de fuerza</div>
                    <div class="panel-body">
                    {!! Form::open(array('url' => 'usuarios/asignar', 'action' => 'post', 'class' => 'form-horizontal')) !!}
                    <div class="row">
                    <div class="col-md-6">
                    <h3 class="text-center">Usuario</h3>
                        <div class="form-group{{ $errors->has('unidad_id') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                               {!! Form::select('id_usuario', $usuarios, null, ['class' => 'form-control', 'placeholder' => 'Selecciona usuario']) !!}

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
                               {!! Form::select('unidad_id', $unidades, null, ['class' => 'form-control', 'placeholder' => 'Selecciona unidad']) !!}

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
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios Asignados</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr class="text-center">
                                <td style="width: 15%">Rut</td>
                                <td>Unidad</td>
                                <td>Nombre</td>
                                <td >Unidad Asignada</td>
                                <td style="width: 5%">Eliminar</td>
                            </tr>
                            </thead>
                            <tbody class="table-hover">
                                
                            @foreach($usuarios_unidad as $u)
                            <tr>
                                <td>{{$u->rut}}</td>
                                <td>{{$u->unidad->sigla}}</td>
                                <td><strong>{{$u->grado->sigla." ".$u->nombres." ".$u->apellido_p." ".$u->apellido_m}}</strong></td>
                                <td>
                                @if(count($u->unidades_asignadas))
                                    {{$u->unidades_asignadas[0]->nombre}}
                                @else
                                    <p>Sin Unidad Asignada</p>
                                @endif
                                </td>
                                <td><button class="btn btn-danger btn-sm delete_user" data-id="{{$u->id}}">Eliminar</button></td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
      </div>
      <div class="modal-body">
        ¿Eliminar relacion?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-danger confirm-delete">Eliminar</button>
      </div>
    </div>
  </div>
</div>    
@endsection

@section('scripts')
    @parent

<script>

    $(".alerta-pf").fadeTo(4000, 500).slideUp(800, function(){
        $(".alerta-pf").alert('close');
    });

    var id;

    $('.delete_user').click(function(event) {

        var nombre = $(this).data('nombre');
        id = $(this).data('id');
        $('#modal_delete').modal('toggle');
        // $(".modal-body").html("Desea eliminar al usuario: <br><br><strong>"+nombre+"</strong>");
    });

    $('.confirm-delete').click(function(event) {
        $.ajax({
            url: '/usuarios/asignados/eliminar',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'DELETE',
            data: {id: id},
        })
        .done(function(data) {
            console.log("success");
           data = $.parseJSON(data);
           if(data.err == "false"){
                location.reload();
           }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });

</script>
@endsection