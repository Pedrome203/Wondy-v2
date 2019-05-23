
@extends('layouts.header')

@section('content')


<div class="container white">
<h1>Editar Producto</h1>

@include('productos.formulario',['producto' => $producto, 'url' => '/productos/'.$producto->id, 'method' => 'PATCH' ])
</div>

@endsection