<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence,
        'imagen' => $faker->sentence,
        'tipo' => $faker->numberBetween(1,4),
        'talla' => 'M',
        'precio' => $faker->numberBetween(500,1500),
        'imagen' => $faker->sentence,
        'calificacion' => 0.0,
        'num_ventas' => 0,
        'user_id' => 1,
        'descripcion' => $faker->sentence(8),
    ];
});
