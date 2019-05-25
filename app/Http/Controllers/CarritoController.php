<?php

namespace App\Http\Controllers;

use App\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index(){
      $productos = getProductos();
      return view('carrito.index');
    }

    public function getProductos(){
      if(\Auth::check()){
        $carrito = Carrito::find(\Auth::id());
        $productos = $carrito->productosEnCarrito()->get();
      }
      else {
        $carrito = Session::get('carrito');
        $carrito = Producto::whereIn('id', $carrito->productos['itemId'])->get();
      }

    }

    public function agregar(Request $request, $producto_id)
    {
      $carrito = Carrito::all();
      // $carrito = new Carrito;
      dd($carrito[0]);
      if(\Auth::check()){
        //se saca el carrito de sesiones
        $carrito = Session::get('carrito');
        //se sacan id y mas cosas
        $userId = \Auth::id();
        $carritoId = Session::get('carrito')->id;
        //se agrega a carritoProductos
        CarritoProducto::create([
          'carrito_id' => $carritoId,
          'producto_id' => $producto_id
        ]);
        $carrito->crearPorSessionId($producto_id);
        Session::put('carrito', carrito);
        return redirect('/carrito');
      }
      else {
        $carrito = new Carrito;
        if(Session::has('carrito')){
            $carrito = Session::get('carrito');
            $carrito->crearPorSessionId($producto_id);
            Session::put('carrito', carrito);
            return redirect('/carrito');
        }
        else{
            $carrito->crearPorSessionId($producto_id);
            Session::put('carrito',carrito);
            return redirect('/carrito');
        }
      }
    }

    public function actualizarSessionCarrito(){

    }
}
