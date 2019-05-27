<h1>¡¡¡Ha realizado una compra!!!</h1>
<h3>Estimado {{$user->name}} gracias por la compra</h3>
<h3>espero disfrutes del producto :)</h3>
<table class="table">
     <thead>
         <tr>
             <th>ID</th>
             <th>Producto</th>
             <th>Cantidad</th>
             <th>Precio</th>
             <th>Tipo</th>
             <th>Talla</th>
             <th>Fecha Compra</th>
         </tr>
     </thead>
     <tbody>
         @foreach($productos as $producto)
             <tr>
                 <td>
                   {{$producto->id }}
                     {{-- <a href="{{ route('documentos.show', $doc->id) }}" class="btn btn-sm btn-info">
                         {{ $doc->id }}
                     </a> --}}
                 </td>
                 <td>{{ $producto->nombre }}</td>
                 <td>{{ $producto->pivot->cantidad }}</td>
                 <td>{{ $producto->precio }}</td>
                 <td>{{ $producto->tipo }}</td>
                 <td>{{ $producto->talla}}</td>
                 <td>{{ $fecha }}</td>
             </tr>
         @endforeach
     </tbody>
 </table>
