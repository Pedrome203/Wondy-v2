<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';

    public static function agruparProductos(){
      if(Auth::check()){
        //guardar en bd
      }
      else{
        //guardar en sessions
      }
    }

    public static function registrosEnCarrito(){
      return $this->hasMany('App\CarritoProducto');
    }

    public function productosEnCarrito(){
      return $this->belongsToMany('App\Producto', 'productos-en-carrito');
    }

    public function regresarProductos(){
      return $this->productosEnCarritos()->count();
    }

    public $total = 0;
    public $productos = null;
    public $productosId = null;
    public function agregarItemCarritoSession($productoId){
      $storedItem = ['total' => 0, 'itemId' => $productoId];
      if ($this->$productos) {
        //si existe ese id dentro de productos;
        if(array_key_exists($productoId, $productos)){
            $this->productosId = $productoId;
            $storedItem = $this->productos[$productoId];
        }
        // foreach ($productos as $producto) {
        //     if($producto['itemId'] == $productoId){
        //       $storedItem = $producto;
        //     }
        }
        $storedItem['total']++;
        $this->productos[$productoId] = $storedItem;
        $this->total++;
      }

        public function reduceByOne($id) {
            $this->items[$id]['qty']--;
            $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
            $this->totalQty--;
            $this->totalPrice -= $this->items[$id]['item']['price'];
            if ($this->items[$id]['qty'] <= 0) {
                unset($this->items[$id]);
            }
        }
        public function removeItem($id) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
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
