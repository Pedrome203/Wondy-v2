
{!! Form::open(['url' => $url, 'method' => $method]) !!}



@if($producto->tipo == '')
@$producto->tipo = 0;
@endif
	


<div class="form-group"> {{ Form::text('nombre',$producto->nombre,['class' => 'form-control', 'placeholder' => 'Nombre'])}} </div>
<div class="form-group"> {{ Form::number('precio',$producto->precio,['class' => 'form-control', 'placeholder' => 'Precio'])}} </div>
<label for="tipo">Tipo de diseño</label>
 <select class="tipo" name="tipo">
 	  <option value="{{$producto->tipo}}">Elige una opción</option>
      <option value="1">Manga Larga</option>
      <option value="2">Manga corta</option>
      <option value="3">Manga normal</option>
      <option value="4">Sueter</option>
 </select>


<div class="form-group"> {{ Form::text('talla',$producto->talla,['class' => 'form-control', 'placeholder' => 'talla'])}} </div>

<div class="form-group"> {{ Form::text('color',$producto->color,['class' => 'form-control', 'placeholder' => 'Color'])}} </div>

<div class="form-group text-right">
	<a href="{{url('/productos')}}">Volver</a>
	<input type="submit" class="btn btn-success" value="Enviar">
</div>

{!! Form::close() !!}