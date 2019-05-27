<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
  protected  $fillable = ['user_id','producto_id','cantidad','fecha_compra','status'];



  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function producto()
  {
    return $this->belongsTo(Producto::class);
  }
}
