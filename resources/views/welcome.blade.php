@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                    @if(session('error'))
                <div class="alert alert-warning alerta-pf" role="alert">{{session('error')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
