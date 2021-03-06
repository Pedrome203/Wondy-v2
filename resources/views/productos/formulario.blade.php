
@include('partials.mensajes')
@include('partials.formErrors')

{!! Form::open(['url' => $url, 'method' => $method,'files' => true]) !!}

<div class="form-group"> {{ Form::text('nombre',$producto->nombre,['class' => 'form-control', 'placeholder' => 'Nombre'])}} </div>
<div class="form-group"> {{ Form::number('precio',$producto->precio,['class' => 'form-control', 'placeholder' => 'Precio'])}} </div>
<label for="tipo">Tipo de diseño</label>
 <select class="tipo" name="tipo">
 	@if ($producto->tipo != '')
 	  <option value="{{$producto->tipo}}" hidden>Elige una opción</option>
    @else
     <option value="0" hidden >Elige una opción</option>
    @endif
     <option {{$producto->tipo == 'Manga Larga' ? 'selected' : ''}} value="1">Manga Larga</option>
      <option {{$producto->tipo == 'Manga corta' ? 'selected' : ''}} value="2">Manga corta</option>
      <option {{$producto->tipo == 'Manga normal'? 'selected' : ''}} value="3">Manga normal</option>
      <option {{$producto->tipo == 'Sueter' ? 'selected' : ''}} value="4">Sueter</option>
 </select>
<div>
<label for="tipo">Talla</label>
 <select class="talla" name="talla">
  @if ($producto->talla != '')
    <option value="{{$producto->talla}}" hidden>Elige una opción</option>
    @else
     <option value="0" hidden>Elige una opción</option>
    @endif
     <option {{$producto->talla == 'c' ? 'selected' : ''}} value="c">Chica</option>
      <option {{$producto->talla == 'm' ? 'selected' : ''}} value="m">Mediana</option>
      <option {{$producto->talla == 'g' ? 'selected' : ''}} value="g">Grande</option>
      <option {{$producto->talla == 'x' ? 'selected' : ''}} value="x">Extra Grande</option>
 </select>

</div>

<div>
<label for="sexo">Genero</label>
 <select class="sexo" name="sexo">
  @if ($producto->tipo != '')
    <option value="{{$producto->sexo}}" hidden>Elige una opción</option>
    @else
     <option value="" hidden>Elige una opción</option>
    @endif
     <option {{$producto->sexo == 'Hombre' ? 'selected' : ''}} value="1">Hombre</option>
      <option {{$producto->sexo == 'Mujer' ? 'selected' : ''}} value="2">Mujer</option>
 </select>

</div>

  <div class="form-group">

    {{-- <input class="form-control" type="file" name="image" value="{{($producto->imagen)}}"> --}}
    {{-- <label for="exampleFormControlFile1">Example file input</label> --}}
    @if($producto != null && $producto != '' && $producto->imagen != '')
    <p>La imagen ya esta cargada, si desea agregar una nueva seleccionela abajo</p>
  @endif
    {!! Form::file('image', null) !!}
    {{-- <input name="img" type="file" class="form-control-file" id="exampleFormControlFile1"> --}}
  </div>



<div class="form-group text-right">
	<a href="{{url('/productos')}}">Volver</a>
	<input type="submit" class="btn btn-success" value="Enviar">
</div>

{!! Form::close() !!}
