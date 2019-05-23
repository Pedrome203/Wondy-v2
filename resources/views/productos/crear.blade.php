
@extends('layouts.header')

@section('content')


<div class="container white">
<h1>Registrar Producto</h1>

{!! Form::open(['url' => '/productos', 'method' => 'POST']) !!}

<div class="form-group"> {{ Form::text('nombre','',['class' => 'form-control', 'placeholder' => 'Nombre'])}} </div>
<div class="form-group"> {{ Form::number('precio','',['class' => 'form-control', 'placeholder' => 'Precio'])}} </div>
<label for="tipo">Tipo de diseño</label>
 <select class="tipo" name="tipo">
      <option value="1">Manga Larga</option>
      <option value="2">Manga corta</option>
      <option value="3">Manga normal</option>
      <option value="4">Sueter</option>
 </select>


<div class="form-group"> {{ Form::text('talla','',['class' => 'form-control', 'placeholder' => 'talla'])}} </div>

<div class="form-group"> {{ Form::text('color','',['class' => 'form-control', 'placeholder' => 'Color'])}} </div>

<div class="form-group text-right">
	<a href="{{url('/productos')}}">Volver</a>
	<input type="submit" class="btn btn-success" value="Enviar">
</div>

{!! Form::close() !!}
</div>

@endsection