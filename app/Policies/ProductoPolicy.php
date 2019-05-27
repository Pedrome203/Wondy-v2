<?php

namespace App\Policies;

use App\User;
use App\Producto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function mostrar(User $user, Producto $producto)
    {
      if(\Auth::check()){
        return $user->id != $producto->user_id;
      }
        return true;
    }

    public function update(User $user, Producto $producto)
    {
      return $user->id == $producto->user_id;
    }
    public function delete(User $user, Producto $producto)
    {
      return $user->id == $producto->user_id;
    }

}
