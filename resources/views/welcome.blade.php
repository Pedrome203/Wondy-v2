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

      <div class="body">
        <div class="disenia-body">
          <img src="{{URL::asset('/images/disenia.jpg')}}" alt="">
          <h1>Diseña</h1>
        </div>
        <div class="compra-body">
          <img src="{{URL::asset('/images/compra.jpg')}}" alt="">
          <h1>Compra</h1>
        </div>
      </div>
      <h1>Los mejores diseños del mundo</h1>
      <div class="multi-carousel">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{URL::asset('/images/disenia.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{URL::asset('/images/disenia.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{URL::asset('/images/disenia.jpg')}}" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{URL::asset('/images/disenia.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{URL::asset('/images/disenia.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{URL::asset('/images/disenia.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{URL::asset('/images/compra.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      </body>
</html>
