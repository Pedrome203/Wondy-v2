@extends('layouts.header')

@section('content')


  <div class="agregar-productos">
    <div class="container-productos-perfil">
      <div class="filtros-perfil">
        {{-- <img class="perfil" src="" > --}}
        <h1 class="nombre-perfil">{{$user->name}}</h1>
        {{-- <div class="tipo-filtro">
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
        </div> --}}
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
      </div>

      <div>

        <div class="productos">
          @foreach ($user->productos as $producto)
            <div class="producto">
              <a href="{{url('/productos',$producto->id)}}">
                <img class="img-1" src="{{Storage::url($producto->imagen)}}" alt="">
                <div class="playera-nombre">
                  <p>{{$producto->nombre}}</p>
                </div>
              </a>
              <div>
              </div>
              <dir>
                <p>{{$producto->sexo}}</p>
              </dir>
              <div class="precio-estrellas">
                <p>${{$producto->precio}}</p>
              </div>
              <form class="" action="{{ route('carrito.agregar') }}" method="POST">
                @csrf
                <input id="productoId" name="productoId" type="hidden" value="{{$producto->id}}">
                <button class="add-cart-btn" type="submit" name="button">
                  <span>Add to cart<span>
                    <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
                  </button>
                </form>
              </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>
  @endsection
