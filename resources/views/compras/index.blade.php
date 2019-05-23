@extends('layouts.header')

@section('content')
  {{-- Se ven todos los productos que has comprado --}}
  @if(isset($compras) && sizeof($compras) > 0)
    @foreach ($compras as $compra)
      <div class="edit-box">
        <div class="imagen-editar">
          <img src="{{URL::asset('/')}}" alt="">
        </div>
        <div class="inf-producto-edit">
          <div class="inf-1">
            <p>Tipo:  {{ $compra->tipo }} </p>
            <p>Nombre:<span> {{$compra->nombre }}</span></p>
            <p>Precio:<span> {{$compra->cantidad }}</span></p>
          </div>
          <div class="inf-2">
            <p>Fecha:<span> {{$compra->fecha_compra }}</span></p>
          </div>
        </div>
        <div class="botones">
          {!! Form::open(['route' => ['compras.destroy', $compra->id], 'method' => 'delete']) !!}
            <button  class="btn-eliminar" type="button" name="button">Borrar</button>
          {!! Form::close() !!}
        </div>
      </div>
    @endforeach
  @else
    @include('partials.missingValues');
  @endif
@endsection
