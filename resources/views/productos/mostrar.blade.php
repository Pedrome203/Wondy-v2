@extends('layouts.app')

@section('content')

 <div class="producto">
                  <img class="img-1"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
                  <div class="playera-nombre">
                    <p>{{$producto->nombre}}</p>
                  </div>
                  <div class="precio-estrellas">
                    <p>{{$producto->precio}}</p>
                    <img src="" alt="">
                  </div>

                  <button class="add-cart-btn" type="button" name="button">
                    <span>Add to cart<span>
                    <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
                  </button>
                  @if(Auth::check() && $producto->user_id == Auth::user()->id)
                  <span class="badge badge-secondary"><a href="{{url('/productos/'.$producto->id.'/edit')}}">Editar</a></span>
                  @include('productos.borrar',['producto' => $producto])
                @endif
                </div>

      </div>
@endsection
