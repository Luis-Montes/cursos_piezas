<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @stack('styles')
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Cursos Laguna</title>
    @vite('resources/js/app.js')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-scroll shadow-0" style="background-color: #ffede7;">
            <div class="container">
                <a class="navbar-brand" href="#">Cursos Laguna</a>
                <button class="navbar-toggler ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon d-flex justify-content-start align-items-center"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    @auth
                    @if(auth()->user()->role == 'admin')
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link px-3" href="{{ route('cursos') }}">Lista de Cursos</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link px-3" href="{{ route('maestros') }}">Lista de Maestros</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link px-3" href="{{ route('codigos') }}">Lista de Codigos</a>
                        </li>
                    </ul>
                    @endif
                    
                    @if(auth()->user()->role == 'estudiante')
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link px-3" href="{{ route('cursos') }}">Lista de Cursos</a>
                            </li>
                        </ul>
                    @endif
                    <form class="nav-link px-3" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button  type="submit" class="font-bold uppercase text-gray-600 text-sm boton"><a type="nav-link">Cerrar Sesión</a></button>
                    </form> 
                    

                    @endauth
                    
                    @guest
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link px-3" href="{{ route('cursos') }}">Lista de Cursos</a>
                        </li>
                    </ul>
                    <a class="nav-link px-3" href="{{ route('login') }}">Iniciar Sesión</a>    
                    @endguest
                    
                </div>
            </div>
        </nav>
        
        
    </header>
    <span></span>
    <main class="container mx-auto">
        <h2 class="font-black text-cente text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>