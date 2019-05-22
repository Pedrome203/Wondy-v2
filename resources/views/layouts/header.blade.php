<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="contenedor">
            <h1 class="logo"> Wondy </h1>
            <div class="infor">
              <ul>
                <li> <a href="#"> Diseña </a></li>
                {{-- <li> <a href="{{ route('profile', auth()->user()->id) }}"> Perfil </a></li> --}}
                <li> <a href="{{ route('login') }}"> Login  </a></li>
                <li> <a href="#"> Carrito </a></li>
              </ul>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-laravel nabar">
            <div class="container">
                  {{-- <a class="navbar-brand" href="{{ url('/') }}">
                      {{ config('app.name', 'Laravel') }}
                  </a> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ action('')}}">Info</a> --}}
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/equipo">Diseñar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                      </li>
                      <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('productos.show') }}">Hombre</a> --}}
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Mujer</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Niños</a>
                      </li>
                      <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('contacto')}}">Contacto</a> --}}
                      </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
