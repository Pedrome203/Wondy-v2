<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
             $table->string('nombre');
            $table->increments('id');
            $table->string('imagen');
            $table->tinyinteger('tipo');//manga larga, normal sueter, sudadera, playera
            $table->float('precio');
            $table->char('talla');
            $table->float('calificacion');
          //  $table->string('nombre');
            $table->string('color');
            $table->unsignedInteger('num_ventas');
            $table->timestamps();
            $table->integer('user_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}