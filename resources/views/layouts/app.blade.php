<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meye</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/canvasjs.min.js')}}"></script>
        <script src="{{ asset('js/meye.js')}}"></script>
        
    </head>
    <body class="bg-secondary" >
        <header class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
                    
                    <a class="navbar-brand" href="#">Meye Digital Assistant</a>
                    @if(!Auth::guest())                    
                        <button class="navbar-toggler" type="button" data-toggle='collapse'
                                data-target="#navbar" aria-controls='navbar' aria-expanded="false"
                                aria-label="Menu de navegación">
                            <span class="navbar-toggler-icon"></span>            
                        </button>


                        <div class="collapse navbar-collapse" id="navbar" >
                            <ul class="navbar-nav mr-auto d-lg-flex w-100 justify-content-between">
                                <li class="nav-item" >
                                    <a href="{{route('createPj')}}" class="nav-link meye-nav-link pl-2  mt-2 mt-lg-0 ml-lg-5 text-muted">Crear Pj</a>
                                </li>
                                <li class="nav-item" >
                                    <a href="{{route('listPjs')}}" class="nav-link meye-nav-link pl-2 text-muted">Ver mis Pjs</a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#" class="nav-link meye-nav-link pl-2 text-muted">Visitar Pjs</a>
                                </li>
                                @if(Auth::user()->type == 'admin')
                                    <li class="nav-item" >
                                        <a href="{{route('passwordReset')}}" class="nav-link meye-nav-link pl-2 text-muted">Restablecer contraseñas</a>
                                    </li>
                                @endif
                                @if(Auth::user()->type == 'master')
                                    <li class="nav-item" >
                                        <a href="{{route('managePj')}}" class="nav-link meye-nav-link pl-2 text-muted">Gestionar Pjs</a>
                                    </li>                                
                                @endif
                                <li class="nav-item" >
                                    <a href="{{route('passwordUpdate')}}" class="nav-link meye-nav-link pl-2 text-muted">Cambiar contraseña</a>
                                </li>
                                <li class="nav-item" >
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-link text-left text-muted mr-auto" type="submit">Salir</button>
                                    </form>
                                </li>
                            </ul>
                        </div>                    
                    @endif
                </nav>
            </div>                
        </header>
        <div class="container">
            @if(\Session::get('message'))
                <div class="row justify-content-center">
                    <div class="col col-sm-8 col-md-6 alert alert-success mt-5 self-align-center mx-3" role="alert">
                        {{Session::get('message')}}
                    </div>
                </div>
            @endif
            
            @if(\Session::get('warning'))
                <div class="row justify-content-center">
                    <div class="col col-sm-8 col-md-6 alert alert-warning mt-5 self-align-center mx-3" role="alert">
                        {{Session::get('warning')}}
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>
