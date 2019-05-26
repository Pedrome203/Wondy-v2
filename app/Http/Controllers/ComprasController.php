<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Compra;
use App\Producto;
use App\CarritoProducto;
use App\Carrito;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //buscamos el id de nuestro usuario conectado
        $userId = \Auth::id();
        //buscamos todas sus compras
        $compras = DB::table('compras')
                    ->join('productos', 'compras.producto_id', '=', 'productos.id')
                    ->select('compras.*', 'productos.imagen',
                     'productos.nombre', 'productos.tipo')
                     ->get();
      //regresamos a la vista con sus compras
       return view('compras.index', compact('compras'));
    }
    public function ventas(){
      //buscamos el id de nuestro usuario conectado
        $userId = \Auth::id();
        //buscamos todas sus compras
        $compras = DB::table('compras')
                    ->join('productos', 'compras.producto_id', '=', 'productos.id')
                    ->select('compras.*', 'productos.imagen',
                     'productos.nombre', 'productos.tipo')
                     ->get();
      //regresamos a la vista con sus compras
       return view('compras.index', compact('compras'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //procuto comprar
    public function create()
    {
      //sacar datos de usuario
      $user = \Auth::user();
      $carrito = Session::get('carrito');
      //sacar objetos en carrito que quiere Comprar
      $productos = $carrito->productosEnCarrito()->get();
      if($productos->count() == 0){
        return redirect('productos');
      }
      //sacar total
      $precio = 0;
      foreach ($productos as $producto) {
        for ($i=0; $i < $producto->getOriginal('pivot_cantidad'); $i++) {
          $precio += $producto->precio;
        }
      }

      return view('compras.comprar', compact('user','productos','total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //guardar compra
        $userId = \Auth::id();
        $productos = $request->productos;
        $productos = json_decode($productos);

        foreach($productos as $producto) {
          // dd($producto->pivot);
            Compra::create([
              'user_id' => $userId,
              'producto_id' => $producto->pivot->producto_id,
              'cantidad' => $producto->pivot->cantidad,
              'fecha_compra' =>  \Carbon\Carbon::now(),
              'status' => 'pendiente',
            ]);
            $this->deleteFromCart($producto->pivot->id,$producto->pivot->producto_id);
          //producto_id
          //cantidad
          //fecha compra
          //status
        }
        return redirect('compras/');
        //borrar items de carrito

    }

    function deleteFromCart($pivote_id, $productoId){
      if(\Auth::check()){
        //se saca el carrito de sesiones
        $carrito = Session::get('carrito');
        //se sacan id y mas cosas
        $userId = \Auth::id();
        $carritoId = $carrito->id;
        //se elimina
        CarritoProducto::find($pivote_id)->delete();
        // $carrito->crearPorSessionId($producto_id);
        $carrito->quitarProducto($productoId);
        Session::put('carrito', $carrito);
      }
      //no está conectado
      // else {
      //   $carrito = new Carrito;
      //   if(Session::has('carrito')){
      //       $carrito = Session::get('carrito');
      //       //se crea el producto
      //       $carrito->quitarProducto($producto_id);
      //       Session::put('carrito', $carrito);
      //   }
      // }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
