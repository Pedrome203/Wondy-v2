@extends('layouts.header')

@section('content')
  {{-- Se ven todos los productos que has comprado --}}
  @if(isset($productos) && sizeof($productos) > 0)
    @foreach ($productos as $compra)
      <div class="edit-box">
        <div class="imagen-editar">
          <img src="{{Storage::url($compra->imagen)}}" alt="">
        </div>
        <div class="inf-producto-edit">
          <div class="inf-1">
            <p>Tipo: {{ $compra->tipo }} </p>
            <p>Nombre: <span> {{$compra->nombre }}</span></p>
            <p>Precio individual: $<span> {{$compra->precio }}</span></p>
          </div>
          <div class="inf-2">
            <p>Cantidad: {{$compra->getOriginal('pivot_cantidad') }} </p>
            <p>Fecha: <span> {{$compra->getOriginal('pivot_fecha_compra') }}</span></p>
            <p>Total: ${{$compra->precio * $compra->getOriginal('pivot_cantidad')}}</p>
          </div>
        </div>
        {{-- <div class="botones">
          {!! Form::open(['route' => ['compras.destroy', $compra->id], 'method' => 'delete']) !!}
          <button  class="btn-eliminar" type="button" name="button">Borrar</button>
          {!! Form::close() !!}
        </div> --}}
      </div>
    @endforeach
  @else
    @include('partials.missingValues');
  @endif
@endsection
