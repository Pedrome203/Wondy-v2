<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Producto;
use App\CarritoProducto;
use Illuminate\Http\Request;
use Session;

class CarritoController extends Controller
{
    public function index(){
      $productos = $this->getProductos();
      $precio = 0;
      if(isset($productos) && sizeof($productos) > 0){
        foreach ($productos as $producto) {
          // dd($producto->getOriginal('pivot_id'));
          for ($i=0; $i < $producto->getOriginal('pivot_cantidad'); $i++) {
            $precio += $producto->precio;
          }
        }
      }
      return view('carrito.index', ["productos" => $productos],  ["precio" => $precio]);
    }

// agregar dato al carrito de compras
    public function agregar(Request $request)
    {

      if(\Auth::check()){
        //se saca el carrito de sesiones
        $carrito = Session::get('carrito');
        //se sacan id y mas cosas
        if(!$carrito->productoRepetido($request->productoId)){
          $userId = \Auth::id();
          $carritoId = $carrito->id;
          //se agrega a carritoProductos
          CarritoProducto::create([
            'carrito_id' => $carritoId,
            'producto_id' => $request->productoId,
            'cantidad' => 1
          ]);
          $carrito->agregarItemCarritoSession($request->productoId);
          // $carrito->crearPorSessionId($request->productoId);
          Session::put('carrito', $carrito);
        }
        return redirect('/carrito');
      }
      //no está conectado
      else {
        $carrito = new Carrito;
        if(Session::has('carrito')){
            $carrito = Session::get('carrito');
            //se crea el producto
            $carrito->agregarItemCarritoSession($request->productoId);
            Session::put('carrito', carrito);
            return redirect('/carrito');
        }
        else{
            //se le hace un carrito
            return redirect('/carrito');
        }
      }
      return redirect()->route('carrito.index');

    }

    public function cambiarCantidad(Request $request, $productoId){
      if(\Auth::check()){
        $carrito = Session::get('carrito');
        $carritoProducto = CarritoProducto::find($request->pivote_id);
        $carritoProducto->cantidad = $request->cantidad;
        $carritoProducto->save();
      }
      else{
        $carrito = Session::get('carrito');
        $carrito->modificarCantidad($request->cantidad);
      }
      Session::put('carrito', $carrito);

      return redirect('/carrito');
    }
//eliminar dato de carrito
  public function delete(Request $request, $pivote_id){
    if(\Auth::check()){
      //se saca el carrito de sesiones
      $carrito = Session::get('carrito');
      //se sacan id y mas cosas
      $userId = \Auth::id();
      $carritoId = $carrito->id;
      //se elimina
      CarritoProducto::find($pivote_id)->delete();
      // $carrito->crearPorSessionId($producto_id);
      $carrito->quitarProducto($request->productoId);
      Session::put('carrito', $carrito);
      return redirect('/carrito');
    }
    //no está conectado
    else {
      $carrito = new Carrito;
      if(Session::has('carrito')){
          $carrito = Session::get('carrito');
          //se crea el producto
          $carrito->quitarProducto($producto_id);
          Session::put('carrito', $carrito);
          return redirect('/carrito');
      }

    }
  }

    public function getProductos(){
      $productos = null;
      if(\Auth::check()){
        $carrito = Carrito::where('user_id', \Auth::id())->first();
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
    // public function cargarCarrito(){
    //   $userId = \Auth::id();
    //   $carrito = Carrito::where('$user_id', $userId);
    //   Session::put('carrito', $carrito);
    // }

    public function crearCarritoUser(){
      Carrito::crearCarrito();
      return redirect('productos');
    }
    public function cargarCarritoUser(){
      Carrito::loadCarrito();
      return redirect('productos');
    }
    public function crearCarritoSession(){
      $oldCar = null;
      $carrito = new Carrito($oldCar);
      Session::put('carrito', $carrito);
    }

}
