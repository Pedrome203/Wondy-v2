@extends('layouts.header')

@section('content')
  {{--  Se ven todos los productos que has comprado --}}
<h1 id="titulo-carrito">Carrito</h1>
<div class="grid-carrito">

  <div class="carrito">
    @if(isset($productos))
      @foreach ($productos as $producto)
        <div class="edit-box2">
          <div class="imagen-editar2">
            <img src="{{URL::asset('/images/playera.jpg')}}" alt="">
          </div>
          <div class="inf-producto-edit2">
            <div class="inf2-1">
              <p>Nombre: {{$producto->nombre}}</p>
              <p>Tipo: {{$producto->tipo}}</p>
              <p>Calificacion: {{$producto->calificacion}}</p>
            </div>
            <div class="inf-2">
              <p>Precio: {{$producto->precio}}</p>
            </div>
            <div class="inf-3">
              <div class="form-group">
                {!! Form::open(['route' => ['carrito.modify',$producto->id], 'method' => 'POST']) !!}
                  <label for="cantidad">Cantidad:</label>
                  <select class="form-control" name="cantidad" id="cantidad" onchange="this.form.submit()">
                    <option {{$producto->cantidad == 1 ? 'selected' : ''}} value="1">1</option>
                    <option {{$producto->cantidad == 2 ? 'selected' : ''}} value="2">2</option>
                    <option {{$producto->cantidad == 3 ? 'selected' : ''}} value="3">3</option>
                    <option {{$producto->cantidad == 4 ? 'selected' : ''}} value="4">4</option>
                    <option {{$producto->cantidad == 5 ? 'selected' : ''}} value="5">5</option>
                    <option {{$producto->cantidad == 6 ? 'selected' : ''}} value="6">6</option>
                    <option {{$producto->cantidad == 7 ? 'selected' : ''}} value="7">7</option>
                    <option {{$producto->cantidad == 8 ? 'selected' : ''}} value="8">8</option>
                    <option {{$producto->cantidad == 9 ? 'selected' : ''}} value="9">9</option>
                    <option {{$producto->cantidad == 10 ? 'selected' : ''}} value="10">10</option>
                  </select>
                {!! Form::close() !!}
              </div>
              <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    @endif
    <div class="edit-box2">
      <div class="imagen-editar2">
        <img src="{{URL::asset('/images/playera.jpg')}}" alt="">
      </div>
      <div class="inf-producto-edit2">
        <div class="inf2-1">
          <p>Nombre: fsdafsdafdsaf</p>
          <p>Tipo: sdafdsafsafa</p>
          <p>Calificacion: adsfsfdsafa}</p>
        </div>
        <div class="inf-2">
          <p>Precio: asdfasdfasfasd</p>
        </div>
        <div class="inf-3">
          <div class="form-group">
            {{-- <form action="{{ route('carrito.modify', 1) }}" method="POST">
              <input type="hidden" name="_method" value="UPDATE">
              @csrf
            </form> --}}
          <form action="{{ route('carrito.modify', 123) }}" method="POST">
          @csrf
          <input id="productoId" name="productoId" type="hidden" value="xm234jq">
            <label for="cantidad">Cantidad:</label>
            <select name="cantidad" class="form-control" id="cantidad" onchange="this.form.submit()">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option {{5 == 5 ? 'selected' : ''}} value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              {{-- {{$producto->cantidad == 5 ? selected : ''}} --}}
            </select>
          </form>

          </div>
          {{-- <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
          </form> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="comprar-box">
    @if(isset($productos))
      <p>Subtotal ({{ count($productos) }} productos): ${{$precio}} </p>
    @else
      <p>Subtotal (0 productos): ${{$precio}} </p>
    @endif
    <button type="button" name="button">
      Ir al pago
    </button>
  </div>
</div>



@endsection
