<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';
    protected $fillable = ["status"];
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
