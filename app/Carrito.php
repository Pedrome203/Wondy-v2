<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';

    //
    //trabajar con carrito en sessiones
    //
    public $cantidad = 0;
    public $productos = null;
    public $productosId = null;
    public function __construct($oldCar){
      if($oldCar){
        $this->cantidad = $oldCar->total;
        $this->productos = $oldCar->productos;
        $this->productosId = $oldCar->productosId;
      }
    }

    public function agregarItemCarritoSession($productoId){
      $storedItem = ['cantidad' => 0, 'itemId' => $productoId];
      if ($this->$productos) {
        //si existe ese id dentro de productos;
        if(array_key_exists($productoId, $productos)){
            $this->productosId = $productoId;
            $storedItem = $this->productos[$productoId];
        }
      }
      if($this->$productosId){
        if(!in_array($productoId,$this->$productosId)){
          array_push($this->$productosId, $procutoId);
        }
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
      if($cantidad > $this->productos[$id]['cantidad']){

      }
      else{

      }
      $this->$productos[$id]['cantidad']--;
      $this->cantidad--;
    }

    public function quitarProducto($id) {
      $this->cantidad -= $this->productos[$id]['cantidad'];
      $index = array_search($id,$this->productosId);
      unser($this->productosId[$index]);
      unset($this->productos[$id]);
    }



//Carrito por usuario conectados

    public static function registrosEnCarrito(){
      return $this->hasMany('App\CarritoProducto');
    }

//regresa productos que tiene el carrito
    public function productosEnCarrito(){
      return $this->belongsToMany('App\Producto', 'productos-en-carritos');
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
      return Carrito::create([
        "status" => "inclomplete"
      ]);
    }
}
