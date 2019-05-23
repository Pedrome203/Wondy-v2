@extends('layouts.header')

@section('content')
  <div class="edit-box">
    <div class="imagen-editar">
      <img src="{{URL::asset('/images/playera.jpg')}}" alt="">
    </div>
    <div class="inf-producto-edit">
      <div class="inf-1">
        <p>Tipo:</p>
        <p>Genero:</p>
        <p>calificacion:</p>
        <p>Nombre:</p>
      </div>
      <div class="inf-2">
        <p>Color:</p>
        <p>Vendidos:</p>
        <p>Precio</p>
      </div>

    </div>
    <div class="botones">
      <button class="btn-editar" type="button" name="button">Editar</button>
      <button  class="btn-eliminar" type="button" name="button">Borrar</button>
    </div>
  </div>
@endsection
