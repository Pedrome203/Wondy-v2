<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
  protected  $fillable = ['user_id','producto_id','cantidad','fecha_compra','status'];
}
