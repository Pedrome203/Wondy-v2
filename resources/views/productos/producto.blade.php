@extends('layouts.header')

@section('content')
  <div class="producto-grid">
    <div class="producto-ver">
      <div class="producto-vistas">
        @for ($i=0; $i < 4; $i++)
          <img class="img-vista"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
        @endfor
      </div>
      <div class="wrapper-producto">
        <img class="img-2"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
      </div>
    </div>
    <form class="especificaciones" action="index.html" method="post">
        <p>$190</p>
        <p>By Crackbron</p>
        <p>110 comentarios</p>
        <p>Color</p>
        <p>Talla</p>
    </form>
  </div>
  <div class="comentarios">
    <div class="comentario">
      <a href="#">
        {{-- <div class=""> --}}
          <img class="foto-perfil-comentario" src="{{URL::asset('/images/playera.jpg')}}" alt="img">
        {{-- </div> --}}
        {{-- <div class="perfil-comentario"> --}}
          <span class="nombre-perfil-comentario"> Crackbron</span>
        {{-- </div> --}}
      </a>
      <img class="calificacion-comentario" src="{{URL::asset('/images/playera.jpg')}}" alt="calificacion">
      <div class="body-comentario">
        <h3 class="fecha-comentario">10/10/1247</h3>
        <h4 class="texto-comentario">Me gusta mucho ir a comprar ropa ahi</h4>
      </div>
    </div>
  </div>
@endsection
