<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Palmera') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/LOGOPALMERA.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/assets/LOGOPALMERA.png') }}">
</head>
<body>
@include('sweetalert::alert')
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"
         style="position: fixed; z-index: 999; opacity:1;width: 100%;">
        <div class="container">
            <img alt="Palmera S.A de C.V" style="max-width: 50px" src="{{asset('/assets/LOGOPALMERA.png')}}">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'Palmera') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto" style="text-align: center">
                    @if(\Illuminate\Support\Facades\Auth::user('id'))
                        @if(Auth::user('id')->validarTipoDeUsuario('@especialistapredio.com'))
                            <li class="nav-item">
                                <a class="nav-link" href={{url("/predio")}}>Predios</a>
                            </li>
                        @endif
                    @endif
                    {{---------------------------------------------------------------------------------------------------------}}
                    @if(\Illuminate\Support\Facades\Auth::user('id'))
                        @if(Auth::user('id')->validarTipoDeUsuario('@especialistapalmera.com'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Asignar Actividades
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" style="width: max-content" href={{url("/asignarActividades")}}>Palmeras
                                        Orgánicas en Predios Orgánicos</a>
                                    <hr>
                                    <a class="nav-link" style="width: max-content"
                                       href={{url("/asignarActividadesPredNoOrg")}}>Palmeras Orgánicas en Predios No
                                        Orgánicos</a>
                                </div>
                            </li>
                        @endif
                    @endif
                </ul>

            {{--------------------------------------------------------------------------------------------------------}}
            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/productos') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/carrito') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div style="margin-top: 4em !important;">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
