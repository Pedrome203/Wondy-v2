@extends('layouts.header')

@section('content')
  {{--  Se ven todos los productos que has comprado --}}
<h1 id="titulo-carrito">Carrito</h1>
<div class="grid-carrito">

  <div class="carrito">
    <div class="edit-box2">
      <div class="imagen-editar2">
        <img src="{{URL::asset('/images/playera.jpg')}}" alt="">
      </div>
      <div class="inf-producto-edit2">
        <div class="inf2-1">
          <p>Nombre:sdafdsfdsfdsfa</p>
          <p>Tipo: sdafdsfdsfdsfa</p>
          <p>Genero:sdafdsfdsfdsfa</p>
          <p>Calificacion:sdafdsfdsfdsfa</p>
        </div>
        <div class="inf-2">
          <p>Precio:sdafdsfdsfdsfa</p>
        </div>
        <div class="inf-3">
          <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <select class="form-control" id="cantidad">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="comprar-box">
    <p>Subtotal ( productos):</p>
    <button type="button" name="button">
      Ir al pago
    </button>
  </div>
</div>



@endsection
