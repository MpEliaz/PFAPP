@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-success" href="{{ URL::action('UsuariosController@create') }}">Agregar Nuevo</a>

                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>Rut</td>
                                <td>Grado</td>
                                <td>Nombres</td>
                                <td>Paterno</td>
                                <td>Materno</td>
                                <td>Rol</td>
                                <td>Estado</td>
                                <td>Modificar</td>
                                <td>Eliminar</td>
                            </tr>
                            </thead>
                            <tbody class="table-hover">
                            @foreach($usuarios as $u)
                                <td>{{$u->rut}}</td>
                                <td>{{$u->grado->nombre}}</td>
                                <td>{{$u->nombres}}</td>
                                <td>{{$u->apellido_p}}</td>
                                <td>{{$u->apellido_m}}</td>
                                <td>{{$u->rol}}</td>
                                <td>
                                    @if($u->estado == 1)
                                        @elseif($u->estado == 2)
                                    @endif

                                </td>
                                <td><button class="btn btn-default btn-sm">Modificar</button></td>
                                <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection