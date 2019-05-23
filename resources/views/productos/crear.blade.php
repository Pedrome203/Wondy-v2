
@extends('layouts.header')

@section('content')


<div class="container white">
<h1>Registrar Producto</h1>
@include('productos.formulario',['producto' => $producto, 'url' => '/productos', 'method' => 'POST']);
</div>

@endsection