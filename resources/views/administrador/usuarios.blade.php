@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-success" href="{{ URL::action('UsuariosController@create') }}">Agregar Nuevo</a>
                {{-- <a class="btn btn-primary" href="{{ URL::action('UsuariosController@asignar_unidad') }}">Asignar Unidad</a> --}}

                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr class="text-center">
                                <td>Rut</td>
                                <td>Unidad</td>
                                <td>Nombres</td>
                                <td>Rol</td>
                                <td >Unidad Asignada</td>
                                <td style="width: 5%">Estado</td>
                                <td style="width: 5%">Modificar</td>
                                <td style="width: 5%">Eliminar</td>
                            </tr>
                            </thead>
                            <tbody class="table-hover">

                            @foreach($usuarios as $u)
                            <tr>
                                <td>{{$u->rut}}</td>
                                <td>{{$u->unidad->sigla}}</td>
                                <td><strong>{{$u->grado->sigla." ".$u->nombres." ".$u->apellido_p." ".$u->apellido_m}}</strong></td>
                                <td>{{$u->rol->nombre}}</td>
                                {{-- <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ URL::to('usuarios/'.$u->id.'/asignar_unidad') }}">Asignar</td> --}}
                                <td>
                                @if(count($u->unidades_asignadas))
                                    {{$u->unidades_asignadas[0]->sigla}}
                                @else
                                    <p>Sin Unidad Asignada</p>
                                @endif
                                </td>
                                <td>                  
                                    @if($u->estado == 0)
                                        <button id="estado-{{$u->id}}" data-id="{{$u->id}}" class="btn btn-success btn-sm cambia_estado">Activar</button>
                                    @elseif($u->estado == 1)
                                        <button id="estado-{{$u->id}}" data-id="{{$u->id}}" class="btn btn-danger btn-sm cambia_estado">Desactivar</button>
                                    @endif
                                </td>
                                <td><a class="btn btn-warning btn-sm" href="{{ URL::action('UsuariosController@edit',['id' => $u->id]) }}">Modificar</a></td>
                                <!-- <td><a class="btn btn-danger btn-sm" href="{{ URL::action('UsuariosController@destroy',['id' => $u->id]) }}" >Eliminar</a></td> -->
                                <td><button class="btn btn-danger btn-sm delete_user" data-id="{{$u->id}}" data-nombre="{{$u->grado->nombre." ".$u->nombres." ".$u->apellido_p." ".$u->apellido_m}}">Eliminar</button></td>
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
    $('.cambia_estado').click(function(event) {
        btn = this;
        $.ajax({
            url: '/usuarios/estado',
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id: this.dataset.id},
        })
        .done(function(data) {
            console.log("success");
            data = $.parseJSON(data);
            if(data.err == "false"){
                if(data.estado == 1)
                {

                    //$(btn).replaceWith('<button id="estado-{{$u->id}}" data-id="{{$u->id}}" class="btn btn-danger btn-sm cambia_estado">Desactivar</button>')
                    $(btn).removeClass('btn-success').addClass('btn-danger');
                    $(btn).text("Desactivar");
                }
                if(data.estado == 0)
                {
                    //$(btn).replaceWith('<button data-id="{{$u->id}}" class="btn btn-success btn-sm cambia_estado">Activar</button>')
                    $(btn).removeClass('btn-danger').addClass('btn-success');
                    $(btn).text("Activar");
                }
            } 

        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });

    var id;

    $('.delete_user').click(function(event) {

        var nombre = $(this).data('nombre');
        id = $(this).data('id');
        $('#modal_delete').modal('toggle');
        $(".modal-body").html("Desea eliminar al usuario: <br><br><strong>"+nombre+"</strong>");
    });

    $('.confirm-delete').click(function(event) {
        $.ajax({
            url: '/usuarios',
            type: 'DELETE',
            data: {id: id},
        })
        .done(function() {
            console.log("success");
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