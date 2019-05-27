<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
  use SoftDeletes;

  protected $guarded = ['id'];
  public function archivos()
  {
    return $this->morphMany('App\Archivo', 'modelo');
  }

  public function setNombreAttribute($nombre)
  {
    $this->attributes['nombre'] = strtoupper($nombre);
  }
  public function getTipoAttribute($tipo)
  {
    if($tipo == 1){
      return "Manga Larga";
    }
    else if($tipo == 2){
      return "Manga corta";
    }
    else if($tipo == 3){
      return "Manga normal";
    }
    else if($tipo == 4){
      return "Sueter";
    }
  }
  public function compras()
  {
    return $this->hasMany(Compra::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

   public function getSexoAttribute($sexo)
    {
    	if($sexo == 1){
			return "Mujer";
    	}
    	else if($sexo == 2){
    		return "Hombre";
    	}
    }
}
