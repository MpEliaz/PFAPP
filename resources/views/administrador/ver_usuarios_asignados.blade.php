@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios Asignados</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr class="text-center">
                                <td style="width: 10%">Rut</td>
                                <td>Unidad</td>
                                <td>Nombres</td>
                                <td >Unidad Asignada</td>
                                <td style="width: 5%">Eliminar</td>
                            </tr>
                            </thead>
                            <tbody class="table-hover">
                                
                            @foreach($usuarios as $u)
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