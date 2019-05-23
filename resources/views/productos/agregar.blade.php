@extends('layouts.header')

@section('content')

  <div class="container">
    @if(@isset($procutos))
      {{-- <form class="agregar-productos" action="{{route('productos.destroy', $producto->id)}}" method="post"> --}}
    @else
    {{-- <form class="agregar-productos" action="{{route('productos.destroy', $producto->id)}}" method="post"> --}}
    @endif
      {{-- @csrf // session expirada, sirve para generar un token o clave para validar --}}
      {{-- que el formulario que esta reciviendo sea de dentro de la aplicacion, te genera
       un campo oculto en automatico.--}}
      <div class="row">
          <div class="col-sm">
            <input type="file" name="file" id="file" class="inputfile" />
            {{-- para mostrar un valor si no es nulo dos opciones--}}
            {{-- {{ isset($dependencia) ? $dependencia->dependencia : ''}} --}}
            {{-- {{ $dependencia->dependencia ?? '' }} --}}
            <label for="file">Choose a file</label>
          </div>
          <div class="col-sm">
            <ul>
              <li>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder= "nombre del producto">
              </li>
              <li>
                <label for="tipo">tipo de diseño</label>
                  <select class="tipo" name="tipo">
                    <option value="1">Manga Larga</option>
                    <option value="2">Manga corta</option>
                    <option value="3">Manga normal</option>
                    <option value="4">Sueter</option>
                  </select>
              </li>
              <li>
                <label for="precio">Precio</label>
                <input type="number" min="1" step="any" />
              </li>
              <li>
                <label for="color">id usuario</label>
                <input type="text" name="" value="">
              </li>
              <li></li>
              <li></li>

            </ul>
            </div>

        </div>
    </form>
  </div>

@endsection
