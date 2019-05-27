<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function productosComprados(){
      return $this->belongsToMany('App\Producto', 'compras')
                  ->withPivot('id','cantidad', 'fecha_compra')
                  ->orderby('fecha_compra','desc')
                  ->get();
    }

    public function compras()
    {
      return $this->hasMany(Compra::class);
    }

    public function productos()
    {
      return $this->hasMany(Producto::class);
    }

    public function archivos()
    {
      return $this->morphMany('App\Archivo', 'modelo');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
