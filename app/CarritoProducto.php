<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarritoProducto extends Model
{
    protected $table = 'productos-en-carritos';
    protected $fillable = ['carrito_id', 'producto_id','cantidad'];
}
