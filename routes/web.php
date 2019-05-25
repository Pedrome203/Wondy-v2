<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  'MainController@home');

Route::resource('productos', 'ProductosController');
Route::resource('compras', 'ComprasController');

Route::get('/agregar-a-carro/{productoId}', 'CarritoController@agregar');
Route::get('carrito','CarritoController@index');
<<<<<<< HEAD
Route::post('carrito/{productoId}','CarritoController@cambiarCantidad')->name('carrito.modify');
=======
Route::post('carrito/edit','CarritoController@cambiarCantidad')->name('carrito/edit');
>>>>>>> ab41832197ae96d13c63d1b80b70352940370e9e


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
