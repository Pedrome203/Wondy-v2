@extends('layouts.header')

@section('content')
  {{-- Donde se va a realizar la compra del producto --}}
  <div class="titulo-compra">
    <h1>Comprando</h1>
    <h3>Asegurese de que los datos que ingreso sean correctos</h3>
  </div>
  {{-- **mostrar datos del usuario --}}
  <div class="user-data-comprar">
    <h2>Datos de la entrega</h2>
    <p>Nombre: {{$user->name}}</p>
    <p>Correo: {{$user->email}}</p>
    <p>Direccion:<span>fsdaffdasfdsafsadfdsafdsafdsafdsfdsafdsafdsfdsafdsafdsfdsafdsafsadf</span></p>
    <p>Celular: </p>
  </div>
  {{-- **mostrar productos que va a comprar --}}
  <div class="comprar-productos">
    @foreach ($productos as $producto)
      
    @endforeach
  </div>

  {{-- **boton para realizar la compra --}}
  <button type="button" name="button">Comprar</button>
@endsection
