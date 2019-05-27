@extends('layouts.header')

@section('content')
  {{-- Donde se va a realizar la compra del producto --}}
  <div class="titulo-compra">
    <h1>Comprando</h1>
    <h3>Asegurese de que los datos sean correctos</h3>
  </div>
  {{-- **mostrar datos del usuario --}}
  <div class="user-data-comprar">
    <h2 style="color:red;">Datos de la entrega</h2>
    <p>Nombre: {{$user->name}}</p>
    <p>Correo: {{$user->email}}</p>
    <p>Direccion:<span>{{$user->direccion}}fsdfsdffdsafasdfsdafasfsadsadfsadfsdafdsafasdfasdfasfdsaf</span></p>
    <p>Celular: {{$user->celular}}</p>
  </div>
  {{-- **mostrar productos que va a comprar --}}
  <div class="comprar-productos ">
    @foreach ($productos as $producto)
      <div class="edit-box3 modificar">
        <div class="imagen-editar2">
          <img src="{{URL::asset('/images/playera.jpg')}}" alt="">
        </div>
        <div class="inf-producto-edit3">
          <div class="inf2-1">
            <p>Nombre: {{$producto->nombre}}</p>
            <p>Tipo: {{$producto->tipo}}</p>
            <p>Calificacion: {{$producto->calificacion}}</p>
          </div>
          <div class="inf-2">
            <p>Precio: {{$producto->precio}}</p>
            <p>Cantidad: {{$producto->getOriginal('pivot_cantidad')}}</p>

          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- **boton para realizar la compra --}}
  <form action="{{ route('compras.store') }}" method="post">
    {{-- <input type="hidden" name="productoId" value="{{$producto->id}}"> --}}
    <input type="hidden" name="productos" value="{{$productos}}">
    @csrf
    <button class="btn btn-primary boton-compra" type="sub" name="button">Comprar</button>
  </form>
@endsection
