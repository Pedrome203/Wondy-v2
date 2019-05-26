<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\CarritoProducto;
class Carrito extends Model
{
    protected $table = 'carrito';

    //
    //trabajar con carrito en sessiones
    //
    public $cantidad = 0;
    public $productos = null;
    public $productosId = [];
    public function __construct($oldCar = null){
      if($oldCar){
        $this->cantidad = $oldCar->total;
        $this->productos = $oldCar->productos;
        $this->productosId = $oldCar->productosId;
      }
    }

    public function productoRepetido($id){

      return $this->productosId == null ? false : in_array($id, $this->productosId);
    }

    public function agregarItemCarritoSession($productoId){
      // dd($this->productos);
      // unset($this->productos[$productoId]);
      $storedItem = ['cantidad' => 0, 'itemId' => $productoId];
      if ($this->productos) {
        //si existe ese id dentro de productos;
        if(array_key_exists($productoId, $this->productos)){
            $storedItem = $this->productos[$productoId];
        }
      }

      if(!in_array($productoId,$this->productosId)){
          array_push($this->productosId, $productoId);
      }
      else{
        array_push($this->productosId, $productoId);
      }
      $storedItem['cantidad']++;
      $this->productos[$productoId] = $storedItem;
      $this->cantidad++;
    }
    public function quitarUno($id) {
      $this->$productos[$id]['cantidad']--;
      $this->cantidad--;
    }

    public function modificarCantidad($cantidad, $id) {
      $temp = 0;
       $this->productos[$id]['cantidad'] = $cantidad;
      if($cantidad > $this->productos[$id]['cantidad']){
        $temp = $cantidad - $this->productos[$id]['cantidad'];
      }
      else{
        $temp =  $this->productos[$id]['cantidad'] - $cantidad;
      }
      $this->cantidad -= $temp;
    }

    public function quitarProducto($id) {
      $this->cantidad -= $this->productos[$id]['cantidad'];
      $index = array_search($id,$this->productosId);
      unset($this->productosId[$index]);
      unset($this->productos[$id]);
    }


//Carrito por usuario conectados

    public static function registrosEnCarrito(){
      return $this->hasMany('App\CarritoProducto');
    }

//regresa productos que tiene el carrito
    public function productosEnCarrito(){
      return $this->belongsToMany('App\Producto', 'productos-en-carritos')
                  ->withPivot('id','cantidad');
    }

    public function regresarProductos(){
          return $this->productosEnCarritos()->count();
    }

    // protected $fillable = ["status"];
    public function numeroProductos(){
      return 2;
    }

    public static function crearPorSessionId($carrito_id){
      if($carrito_id){
        return Carrito::buscar($carrito_id);
      }
      else{
        return Carrito::crearCarrito();
      }
    }

    public static function buscar($carrito_id){
      return Carrito::find($carrito_id);
    }

    public static function crearCarrito(){
      if(\Auth::check()){
        $carrito = new Carrito;
        $carrito->user_id = \Auth::id();
        $carrito->save();
        Session::put('carrito', $carrito);
      }
    }
    public static function loadCarrito(){
      if(\Auth::check()){

        $userId = \Auth::id();
        $carrito = Carrito::where('user_id', $userId)->first();
        if($carrito == null){

        }
        // dd($carrito);
        Session::put('carrito', $carrito);
      }
    }
}
