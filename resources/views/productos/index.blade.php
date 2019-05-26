@extends('layouts.header')

@section('content')
      
      <div class="container-productos">
          <div class="filtros">
          <div class="filtro-container">
          <form action="{{ route('productos.index') }}" method="PUTCHAR">
              
             @csrf
                  <label for="text">Mostrar:</label>
                  <select class="form-control" name="tipo" id="tipo" onchange="this.form.submit()">
                    <option value="0">Todos</option>
                    <option value="1">Playera normal</option>
                    <option value="2">Playera sin manga</option>
                    <option value="3">Playera manga larga</option>
                    <option value="4">Sueter</option>
                    <option value="5">Sudadera</option>
                  </select>
  
  
          </div>
            <div class="precio-filtro">  
             
                <label for="">Precio:</label>
                <br>
                <span class="inside-input">$</span>
                <input id="min" type="number" name="Min" placeholder="Min">
                <span class="inside-input">$</span>
                <input id="max" type="number" name="Max" placeholder="Max">
              <input type="submit" class="btn btn-success" value="Ir">
            </div>
    
          </div>
          <div>
     


          <div class="filtro-container">
              
             
                  <label for="text">Ordenar por:</label>
                  <select class="form-control" name="ordenamiento" id="ordenamiento" onchange="this.form.submit()">
                    <option value="1">Agregado recientemente</option>
                    <option value="2">Más comprado</option>
                    <option value="3">Precio de bajo a alto</option>
                    <option value="4">Precio de alto a bako</option>
                  </select>
        </form>
  
          </div>
            <div class="productos">
              @foreach ($productos as $producto)
                <div class="producto">
                  <img class="img-1"src="{{URL::asset('/images/playera.jpg')}}" alt="Playera con diseño">
                  <div class="playera-nombre">
                 <a href="{{url('/productos/'.$producto->id)}}"><p>{{$producto->nombre}}</p></a>   
                  </div>
                  <div>
                    <p>{{$producto->tipo}}</p>
                  </div>
                  <div class="precio-estrellas">
                    <p>{{$producto->precio}}</p>
                    <img src="" alt="">
                  </div>
                  <button class="add-cart-btn" type="button" name="button">
                    <span>Add to cart<span>
                    <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
                  </button>
                </div>
              @endforeach

            </div>
          </div>

      </div>
    </form>
@endsection
