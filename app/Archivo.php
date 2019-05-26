<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
  protected $guarded = ['id'];

  public function producto()
  {
     return $this->belongsTo(Producto::class);
  }
   public function user()
   {
     return $this->belongsTo(User::class);
   }
}
