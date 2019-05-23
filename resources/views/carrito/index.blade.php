@extends('layouts.header')

@section('content')
  {{--  Se ven todos los productos que has comprado --}}
  <div class="grid-comprar-index">
    <div class="edit-box2">
      <div class="imagen-editar">
        <img src="{{URL::asset('/images/playera.jpg')}}" alt="">
      </div>
      <div class="inf-producto-edit2">
        <div class="inf-1">
          <p>Tipo: sdafdsfdsfdsfa</p>
          <p>Genero:sdafdsfdsfdsfa</p>
          <p>calificacion:sdafdsfdsfdsfa</p>
          <p>Nombre:sdafdsfdsfdsfa</p>
        </div>
        <div class="inf-2">
          <p>Color:sdafdsfdsfdsfa</p>
          <p>Vendidos:sdafdsfdsfdsfa</p>
          <p>Precio:sdafdsfdsfdsfa</p>
        </div>
      </div>
    </div>
    <div class="comprar-box">

    </div>
  </div>
@endsection
