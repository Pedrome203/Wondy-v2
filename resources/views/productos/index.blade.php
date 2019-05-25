@extends('layouts.header')

@section('content')
    <form class="agregar-productos" action="" method="post">
      <div class="container-productos">
          <div class="filtros">
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
          </div>
          <div>
          <div class="filtro-container">
            <form class="" action="index.html" method="get">
              <div class="filtro">
                <label for="text"> Ordenar por: </label>
                <select name="filtro" onchange="this.form.submit();">
                    <option value="Agregado reciente">Agregado reciente</option>
                    <option value="Mas comprado">Mas comprado</option>
                    <option value="Precio de bajo a alto">Precio de bajo a alto</option>
                    <option value="Precio de alto a bajo">Precio de alto a bajo</option>
                </select>
                <noscript><input type="submit" value="Submit"></noscript>
              </div>
            </form>
          </div>
            <div class="productos">
              @foreach ($productos as $producto)
                <div class="producto">
                  <img class="img-1"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
                  <div class="playera-nombre">
                    <p>{{$producto->nombre}}</p>
                  </div>
                  <div class="precio-estrellas">
                    <p>{{$producto->precio}}</p>
                    <img src="" alt="">
                  </div>
                  <form class="" action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input id="productoId" name="productoId" type="hidden" value="{{$producto->id}}">
                    <button class="add-cart-btn" type="submit" name="button">
                      <span>Add to cart<span>
                        <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
                      </button>
                  </form>
                  <span class="badge badge-secondary"><a href="{{url('/productos/'.$producto->id.'/edit')}}">Editar</a></span>
                  @include('productos.borrar',['producto' => $producto])
                </div>
              @endforeach

            </div>
          </div>

      </div>
    </form>
@endsection
