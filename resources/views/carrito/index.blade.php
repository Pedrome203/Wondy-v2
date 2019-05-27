@extends('layouts.header')

@section('content')
  {{--  Se ven todos los productos que has comprado --}}
<h1 id="titulo-carrito">Carrito</h1>
<div class="grid-carrito">

  <div class="carrito">
    @if(isset($productos) && sizeof($productos) > 0)
      @foreach ($productos as $producto)
        <div class="edit-box2">
          <div class="imagen-editar-div">
            <img class="imagen-editar2" src="{{Storage::url($producto->imagen)}}" alt="">
          </div>
          <div class="inf-producto-edit2">
            <div class="inf2-1">
              <p>Nombre: {{$producto->nombre}}</p>
              <p>Tipo: {{$producto->tipo}}</p>
              <p>Talla: {{$producto->talla}}</p>
            </div>
            <div class="inf-2">
              <p>Sexo: {{$producto->sexo}}</p>
              <p>Precio: {{$producto->precio}}</p>

            </div>
            <div class="inf-3">
              <div class="form-group">
                <form action="{{ route('carrito.modify', $producto->id) }}" method="POST">
                  <input type="hidden" name="pivote_id" value="{{ $producto->getOriginal('pivot_id') }}">
                  {{-- <input type="hidden" name="pivote_cantidad" value="{{$producto->getOriginal('pivot_cantidad')}}"> --}}
                @csrf
                <input id="productoId" name="productoId" type="hidden" value="{{$producto->id}}">
                  <label for="cantidad">Cantidad:</label>
                  <select class="form-control" name="cantidad" id="cantidad" onchange="this.form.submit()">
                    <option {{$producto->getOriginal('pivot_cantidad') == 1 ? 'selected' : ''}} value="1">1</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 2 ? 'selected' : ''}} value="2">2</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 3 ? 'selected' : ''}} value="3">3</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 4 ? 'selected' : ''}} value="4">4</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 5 ? 'selected' : ''}} value="5">5</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 6 ? 'selected' : ''}} value="6">6</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 7 ? 'selected' : ''}} value="7">7</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 8 ? 'selected' : ''}} value="8">8</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 9 ? 'selected' : ''}} value="9">9</option>
                    <option {{$producto->getOriginal('pivot_cantidad') == 10 ? 'selected' : ''}} value="10">10</option>
                  </select>
                </form>
              </div>
              <form action="{{ route('carrito.destroy', $producto->getOriginal('pivot_id')) }}" method="post">
                <input type="hidden" name="productoId" value="{{$producto->id}}">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
  <div class="comprar-box">
    @if(isset($productos))
      <p>Subtotal ({{ count($productos) }} productos): ${{$precio}} </p>
    @else
      <p>Subtotal (0 productos): ${{$precio}} </p>
    @endif
    <a href="{{ route('compras.create') }}">
        <button type="button" name="button">
          Ir al pago
        </button>
    </a>
  </div>
</div>



@endsection
