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
    	else if($tipo == 3){
    		return "Sueter";	
    	}

        
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

    public function scopeOrder($query, $metodo, $orden){
    	return $query->orderBy($metodo, $orden);
    }
}
