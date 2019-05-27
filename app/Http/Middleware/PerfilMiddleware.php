<?php

namespace App\Http\Middleware;

use App\Producto;

use Closure;

class PerfilMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $productos = Producto::where('user_id', \Auth::user()->id)->get();

        if(sizeof($productos)>0){
            return $next($request);
        }
         else{
                return redirect()->back()->with(['mensaje' => 'No eres vendedor']);
         }        
    }
}
