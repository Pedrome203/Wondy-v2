<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wondy</title>

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
      <div class="coontainer">
        <div class="header">

        <div class="contenedor">
            <h1 class="logo"> Wondy </h1>
                @if (Route::has('login'))
                  <div class="infor">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                @endif
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-laravel nabar">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/equipo">Diseñar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                      </li>
                      <li class="nav-item">
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Mujer</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Niños</a>
                      </li>
                      <li class="nav-item">
                      </li>
                    </ul>
                </div>
            </div>
        </nav>
      </div>

      <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{URL::asset('/images/dise.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Diseña</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{URL::asset('/images/buy3.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Compra</h5>
              </div>
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </div>

      </body>
</html>
