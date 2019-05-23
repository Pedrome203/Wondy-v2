@extends('layouts.app')

@section('content')


  <div class="agregar-productos">
    <div class="container-productos-perfil">
      <div class="filtros-perfil">
          <img class="perfil" src="{{URL::asset('/images/playera.jpg')}}" alt="foto de perfil">
          <h1 class="nombre-perfil">Crackbron</h1>
            <div class="tipo-filtro">
              <label for="">Tipo:</label>
              <ul>
                <li>
                  <a href="#">Playera normal</a>
                </li>
                <li>
                  <a href="#">Playera sin manga</a>
                </li>
                <li>
                  <a href="#">Playera manga larga</a>
                </li>
                <li>
                  <a href="#">Sueter</a>
                </li>
                <li>
                  <a href="#">Sudadera</a>
                </li>
              </ul>
            </div>
            <div class="precio-filtro">
              <form class="" action="index.html" method="post" id="precio">
                <label for="">Precio:</label>
                <br>
                <span class="inside-input">$</span>
                <input id="min" type="text" name="Min" placeholder="Min">
                <span class="inside-input">$</span>
                <input id="max" type="text" name="Max" placeholder="Max">
              </form>
              <button id="submit-precio" type="submit" form="precio" value="Submit">Ir</button>
            </div>
            <div class="estrella-filtro">
              <label for="">Estrellas:</label>
              <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
            {{-- <div class="color-filtro">

            </div> --}}

      </div>

      <div>
          {{-- @foreach ($producto as $prod)
          <div class="producto">
          <img class="img-1"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
          <div class="playera-nombre">
          <p>{{$prod->descripcion}}</p>
        </div>
        <div class="precio-estrellas">
        <p>{{$prod->precio}}</p>
        <img src="" alt="">
      </div>
      <button class="add-cart-btn" type="button" name="button">
      <span>Add to cart<span>
      <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
    </button>
  </div>
  @endforeach --}}
  <div class="ajustes-d">
    <a href="#">
      <img class="ajustes"src="{{URL::asset('/images/ajustes.png')}}" alt="ajustes">
    </a>
  </div>
    <div class="productos">
      @for ($i=0; $i < 10; $i++)
        <div class="producto">
          <img class="img-1"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
          <div class="playera-nombre">
            <p>Playera con mangas negras</p>
          </div>
          <div class="precio-estrellas">
            <p>$150</p>
            <img src="" alt="">
          </div>
          <button class="add-cart-btn" type="button" name="button">
            <span>Add to cart<span>
              <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
            </button>
          </div>
        @endfor
    </div>

      </div>
  </div>
</div>
@endsection
