@extends('layouts.header')

@extends('partials.mensajes')
@section('content')

      <div class="container-productos">
          <div class="filtros">
          <div class="filtro-container">
          <form action="{{ route('productos.index') }}" method="PUTCHAR">
             @csrf
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
                {{-- @if($producto->user_id != Auth::user()->id) --}}
                <div class="producto">
                  <a href="{{url('/productos',$producto->id)}}">
                    <img class="img-1" src="{{Storage::url($producto->imagen)}}" alt="">
                    <div class="playera-nombre">
                      {{-- <a href="{{url('/productos/'.$producto->id)}}">  --}}
                      <p>{{$producto->user_id}}</p>
                      {{-- </a> --}}
                    </div>
                  </a>
                  <div>
                    {{-- <p>Tipo: {{$producto->tipo}}</p> --}}
                  </div>
                  <dir>
                    <p>{{Auth::user()->id}}</p>
                  </dir>
                  <div class="precio-estrellas">
                    <p>${{$producto->precio}}</p>
                    <p>Tipo: {{$producto->tipo}}</p>
                    {{-- <img src="" alt=""> --}}
                  </div>
                  <form class="" action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input id="productoId" name="productoId" type="hidden" value="{{$producto->id}}">
                    <button class="add-cart-btn" type="submit" name="button">
                      <span>Add to cart<span>
                        <img class="add-cart-img" src="{{URL::asset('/images/add.png')}}">
                      </button>
                  </form>
           
                </div>
                  {{-- @endif --}}
              @endforeach
           
            </div>
          </div>

      </div>
    </form>
    <div class="">
      {{ $productos->links()}}
    </div>
@endsection
