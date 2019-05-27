@extends('layouts.header')

@section('content')
  {{-- se ven todas las ventas --}}
  @if(isset($productos) && sizeof($productos) > 0)
    @foreach ($productos as $producto)
      <div class="edit-box">
        <div class="imagen-editar">
          <img src="{{URL::asset('/')}}" alt="">
        </div>
        <div class="inf-producto-edit">
          <div class="inf-1">
            <p>Tipo:  {{ $producto->tipo }} </p>
            <p>Nombre:<span> {{$producto->nombre }}</span></p>
            <p>Precio:<span> {{$producto->cantidad }}</span></p>
          </div>
          <div class="inf-2">
            <p>Fecha:<span> {{$producto->fecha_producto }}</span></p>
          </div>
        </div>
        {{-- <div class="botones">
          {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
            <button  class="btn-eliminar" type="button" name="button">Borrar</button>
          {!! Form::close() !!}
        </div> --}}
      </div>
    @endforeach
  @else
    @include('partials.missingValues');
  @endif
@endsection
