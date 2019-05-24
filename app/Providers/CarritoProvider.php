<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Carrito;
class CarritoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      view()->composer('*', function($view){
        $carrito_id = session('carrito_id');
        $carrito = Carrito::crearPorSessionId($carrito_id);
        session('carrito_id', $carrito->id);
        $view->with("carrito", $carrito);
      });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
