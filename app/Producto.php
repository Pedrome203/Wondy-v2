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
}
