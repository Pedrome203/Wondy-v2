<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Producto;


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Producto::create([
            'nombre' => 'Playera Adidas',
            'imagen' => 'miImagen',
            'tipo' => 1,
            'precio' => 999.00,
            'talla' => 'c',
            'imagen' => 'miImagen',
            'precio' => 999.00,
            'calificacion' => 0.0,
            'num_ventas' => 0,
            'user_id' => 1,
            'descripcion' => 'Playera color blanca temporada primavera-verano',

        ]);

        factory(App\Producto::class, 25)->create();
    }
}
