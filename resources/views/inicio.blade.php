@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                    @if(session('error'))
                <div class="alert alert-warning alerta-pf" role="alert">{{session('error')}}</div>
            @endif
        <div class="row">
            <div class="col-md-4">
                <div class="panel widget bg-color1">
                    <div class="col-md-4"></div>
                    <div class="col-md-8"></div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
