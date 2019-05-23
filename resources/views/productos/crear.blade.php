
@extends('layouts.header')

@section('content')


<div class="container white">
<h1>Registrar Producto</h1>

{!! Form::open(['url' => '/productos', 'method' => 'PUT']) !!}

<div class="form-group"> {{ Form::text('nombre','',['class' => 'form-control', 'placeholder' => 'Nombre'])}} </div>
<div class="form-group"> {{ Form::number('precio','',['class' => 'form-control', 'placeholder' => 'Precio'])}} </div>
<div class="form-group"> {{ Form::text('imagen','',['class' => 'form-control', 'placeholder' => 'imagen'])}} </div>
<div class="form-group"> {{ Form::text('tipo','',['class' => 'form-control', 'placeholder' => 'tipo'])}} </div>
<div class="form-group"> {{ Form::text('talla','',['class' => 'form-control', 'placeholder' => 'talla'])}} </div>
<div class="form-group"> {{ Form::text('calificacion','',['class' => 'form-control', 'placeholder' => 'calificacion'])}} </div>
<div class="form-group"> {{ Form::text('color','',['class' => 'form-control', 'placeholder' => 'Color'])}} </div>

<div class="form-group text-right">
	<a href="{{url('/productos')}}">Volver</a>
	<input type="submit" class="btn btn-success" value="Enviar">
</div>

{!! Form::close() !!}
</div>

@endsection