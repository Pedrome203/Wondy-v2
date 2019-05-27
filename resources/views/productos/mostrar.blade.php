@extends('layouts.header')

@section('content')

  <div class="producto-grid">
    <div class="producto-ver">
      <div class="producto-vistas">
        {{-- @for ($i=0; $i < 4; $i++)
        <img class="img-vista"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
      @endfor --}}
    </div>
    <div class="wrapper-producto">
      <img class="img-2"src="{{Storage::url($producto->imagen)}}" alt="Playera con diseño">
    </div>
  </div>
  <form class="especificaciones" action="index.html" method="post">
    <p>Precio: ${{$producto->precio}}</p>
    <p>Talla: {{$producto->talla}}</p>
    <p>Tipo:  {{$producto->tipo}}</p>
    <p>Sexo:  {{$producto->sexo == 1 ? 'mujer': 'hombre'}}</p>
    @can('mostrar', $producto)
      <form class="" action="{{ route('carrito.agregar') }}" method="POST">
        @csrf
        <input id="productoId" name="productoId" type="hidden" value="{{$producto->id}}">
        <button class="add-cart-btn" style="width:50%" type="submit" name="button">
          <span>Add to cart<span>
            <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
          </button>
        </form>
      @endcan
    </form>
    @can('delete', $producto)
      <span class="button badge-secondary"><a href="{{url('/productos/'.$producto->id.'/edit')}}">Editar</a></span>
      @include('productos.borrar',['producto' => $producto])
    @endcan
  </div>
@endsection
