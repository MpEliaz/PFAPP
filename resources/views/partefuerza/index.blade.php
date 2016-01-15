@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-success" href="{{ URL::action('ParteFuerzaController@create') }}">Agregar Nuevo Parte de Fuerza</a>

                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>Id</td>
                                <td>Fecha Cración</td>
                                <td>Unidad</td>
                                <td>Responsable</td>
                                <td>Fuerza</td>
                                <td>Forman</td>
                                <td>Faltan</td>
                                <td style="width: 5%;">Estado</td>
                                <td style="width: 5%;">Modificar</td>
                                <td style="width: 5%;"></td>
                            </tr>
                            </thead>
                            <tbody class="table-hover">
                            @foreach($partes as $p)
                            {{$p}}
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->creado_el}}</td>
                                {{-- <td>{{$p->unidad_id}}</td> --}}
                                {{-- <td>{{$p->responsable->nombres." ".$p->responsable->apellido_p." ".$p->responsable->apellido_m}}</td> --}}
                                <td>{{$p->fuerza_total}}</td>
                                <td>{{$p->forman_total}}</td>
                                <td>{{$p->faltan_total}}</td>
                                <td>                  
                                    @if($p->estado == 0)
                                        <button id="estado-{{$p->id}}" data-id="{{$p->id}}" class="btn btn-success btn-sm cambia_estado"><i class="fa fa-btn fa-user"></i</button>
                                    @elseif($p->estado == 1)
                                        <button id="estado-{{$p->id}}" data-id="{{$p->id}}" class="btn btn-danger btn-sm cambia_estado">Desactivar</button>
                                    @endif
                                </td>
                                <td><a class="btn btn-warning btn-sm" href="{{ URL::action('UsuariosController@edit',['id' => $p->id]) }}">Modificar</a></td>
                                <td><button class="btn btn-success btn-sm parte-detail" data-id="{{$p->id}}">Ver Detalle</button></td>
                            </tr>                             
                            @endforeach                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($partes as $p)
   {{-- MODAL DETALLE --}}
 <div class="modal fade bs-example-modal-lg" id="modal_parte_detalle-{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle del parte de fuerza</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-6">
        	<table class="table table-hover">
	        	<thead>
	        		<tr>
	        			<td><strong>CAT</strong></td>
	        			<td><strong>FUERZA</strong></td>
	        			<td><strong>FORMAN</strong></td>
	        			<td><strong>FALTAN</strong></td>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<tr>
	        			<td>OF</td>
	        			<td>{{$p->of_fuerza}}</td>
	        			<td>{{$p->of_forman}}</td>
	        			<td>{{$p->of_faltan}}</td>
	        		</tr>
	        		<tr>
	        			<td>CP</td>
	        			<td>{{$p->cp_fuerza}}</td>
	        			<td>{{$p->cp_forman}}</td>
	        			<td>{{$p->cp_faltan}}</td>
	        		</tr>
	        		<tr>
	        			<td>SLTP</td>
	        			<td>{{$p->sltp_fuerza}}</td>
	        			<td>{{$p->sltp_forman}}</td>
	        			<td>{{$p->sltp_faltan}}</td>
	        		</tr>
	        		<tr>
	        			<td>SLC</td>
	        			<td>{{$p->slc_fuerza}}</td>
	        			<td>{{$p->slc_forman}}</td>
	        			<td>{{$p->slc_faltan}}</td>
	        		</tr>
	        		<tr>
	        			<td>EC</td>
	        			<td>{{$p->ec_fuerza}}</td>
	        			<td>{{$p->ec_forman}}</td>
	        			<td>{{$p->ec_faltan}}</td>
	        		</tr>	 
	        		<tr>
	        			<td>ALUMNOS</td>
	        			<td>{{$p->alumnos_fuerza}}</td>
	        			<td>{{$p->alumnos_forman}}</td>
	        			<td>{{$p->alumnos_faltan}}</td>
	        		</tr>
	        		<tr>
	        			<td>TOTAL</td>
	        			<td>{{$p->fuerza_total}}</td>
	        			<td>{{$p->forman_total}}</td>
	        			<td>{{$p->faltan_total}}</td>
	        		</tr>
	        	</tbody>	        			        		       			        			        			        			        
        	</table>
        </div>
        <div class="col-md-6">
        	<table class="table table-hover">
	        	<thead>
	        		<tr>
	        			<td><strong>CANTIDAD</strong></td>
	        			<td><strong>MOTIVO</strong></td>
	        		</tr>
	        	</thead>
	        	<tbody>
	        	{{$p->responsable->rut}}
	        	@foreach($p->demostracion as $d)
	        		<tr>
	        			<td>{{$d->cantidad}}</td>
	        			<td>{{$d->motivo_id}}</td>
	        		</tr>
	        	@endforeach 

	        	</tbody>	        			        		       			        			        			        			        
        	</table>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-danger confirm-delete">Eliminar</button>
      </div>
    </div>
  </div>
</div>
{{-- MODAL DETALLE --}}
@endforeach       
@endsection

@section('scripts')
	@parent
	<script>
    $('.parte-detail').click(function(event) {

        var nombre = $(this).data('nombre');
        id = $(this).data('id');
        $('#modal_parte_detalle-'+id).modal('toggle');
        //$(".modal-body").html("Desea eliminar al usuario: <br><br><strong>"+nombre+"</strong>");
    });
	</script>
@endsection