<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Partes de Fuerza Operativo Institucional</title>

    <!-- Fonts -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'> --}}
    {!! Html::style('assets/css/font-awesome.min.css') !!} 
    {{-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'> --}}
    {{-- {!! Html::style('assets/css/google-fonts.css') !!}  --}}

    <!-- Styles -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
    {!! Html::style('assets/css/bootstrap.min.css') !!} 
    {!! Html::style('assets/css/main.css') !!} 
    {{-- <link href="{{ elixir('css/main.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Partes de Fuerza Institucional
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    @if (Auth::check())
                    @if(Auth::user()->isAdmin())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span>Usuarios</span>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/usuarios') }}">Ver Todos</a></li>
                            <li><a href="{{ url('/usuarios/asignar') }}">Asignar a Unidad</a></li>
                            <li><a href="{{ url('/usuarios/asignados') }}">Ver Asignados</a></li>
                        </ul>
                    </li>
                    
                    @endif
                    <li><a href="{{ url('/partefuerza') }}">Parte de Fuerza</a></li>
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Ingresar</a></li>
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               <strong> {{ Auth::user()->grado->sigla." ".Auth::user()->nombres." ".Auth::user()->apellido_p." ".Auth::user()->apellido_m }} </strong><span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
    {!! Html::script('assets/js/jquery.min.js') !!}  
    {!! Html::script('assets/js/bootstrap.min.js') !!} 
    {!! Html::script('assets/js/jquery.Rut.min.js') !!}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script>
        $(".alerta-pf").fadeTo(4000, 500).slideUp(800, function(){
            $(".alerta-pf").alert('close');
        });

    </script>

    @yield('scripts')
</body>
</html>
