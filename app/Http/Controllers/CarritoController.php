<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Producto;
use Illuminate\Http\Request;
use Session;

class CarritoController extends Controller
{
    public function index(){
      $productos = $this->getProductos();
      $precio = 10000;
      if(isset($productos)){
        foreach ($productos as $producto) {
          $precio += $producto->precio;
        }
      }
      return view('carrito.index',  ["productos" => $productos],  ["precio" => $precio]);
    }

// agregar dato al carrito de compras
    public function agregar(Request $request, $producto_id)
    {
      if(\Auth::check()){
        //se saca el carrito de sesiones
        $carrito = Session::get('carrito');
        //se sacan id y mas cosas
        $userId = \Auth::id();
        $carritoId = $carrito->id;
        //se agrega a carritoProductos
        CarritoProducto::create([
          'carrito_id' => $carritoId,
          'producto_id' => $producto_id,
          'cantidad' => 1
        ]);
        $carrito->crearPorSessionId($producto_id);
        Session::put('carrito', carrito);
        return redirect('/carrito');
      }
      //no está conectado
      else {
        $carrito = new Carrito;
        if(Session::has('carrito')){
            $carrito = Session::get('carrito');
            //se crea el producto
            $carrito->agregarItemCarritoSession($producto_id);
            Session::put('carrito', carrito);
            return redirect('/carrito');
        }
        else{
            //se le hace un carrito

            return redirect('/carrito');
        }
      }
    }

    public function cambiarCantidad(Request $request, Producto $producto){
      // dd($producto->hola);
      dd($request->all());
      // $productoId = $request->input();
      if(\Auth::check()){

      }
      else{

      }
      return redirect('/carrito');
    }
//eliminar dato de carrito
  public function delete($productoId){
    if(\Auth::check()){
      //se saca el carrito de sesiones
      $carrito = Session::get('carrito');
      //se sacan id y mas cosas
      $userId = \Auth::id();
      $carritoId = $carrito->id;
      //se elimina
      App\CarritoProducto::where('carrito_id', $carritoId)
                            ->where('producto_id',$productoId)
                            ->delete();
      // $carrito->crearPorSessionId($producto_id);
      // Session::put('carrito', carrito);
      return redirect('/carrito');
    }
    //no está conectado
    else {
      $carrito = new Carrito;
      if(Session::has('carrito')){
          $carrito = Session::get('carrito');
          //se crea el producto
          $carrito->quitarProducto($producto_id);
          Session::put('carrito', carrito);
          return redirect('/carrito');
      }
    }
  }

    public function getProductos(){
      $productos = null;
      if(\Auth::check()){
        $carrito = Carrito::find(\Auth::id());
        $productos = $carrito->productosEnCarrito()->get();
      }
      else {
        if(Session::has('carrito')){
          $carrito = Session::get('carrito');
          if(isset($carrito->productosId)){
            $productos = Producto::whereIn('id', $carrito->productosId)->get();
          }
        }
        else{
          $this->crearCarritoSession();
        }
        //se hace un query con los id de los productos
      }
      return $productos;
    }

    //cargar carrito al inicio de sesion
    public function cargarCarrito(){
      $userId = \Auth::id();
      $carrito = Carrito::where('$user_id', $userId);
      Session::put('carrito', $carrito);
    }
    public function crearCarritoUser(){

    }
    public function crearCarritoSession(){
      $oldCar = null;
      $carrito = new Carrito($oldCar);
      Session::put('carrito', $carrito);
    }

    public function actualizarSessionCarrito(){

    }
}
