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
// E-mail verification
Route::get('/register/verify/{code}', 'Auth\RegisterController@verify');

Route::get('/',  'MainController@home');

Route::resource('productos', 'ProductosController');
Route::resource('compras', 'ComprasController', ['except' => ['show', 'edit', 'update']])->middleware('auth');;
Route::get('ventas','ComprasController@ventas')->name('ventas.index')->middleware('auth');;


//carrito
Route::get('cargarCarrito','CarritoController@cargarCarritoUser')->name('carrito.cargar');
Route::get('crearCarrito','CarritoController@crearCarritoUser')->name('carrito.crear');
Route::get('/agregar-a-carro/{productoId}', 'CarritoController@agregar');
Route::get('carrito','CarritoController@index')->name('carrito.index');
Route::post('carrito','CarritoController@agregar')->name('carrito.agregar');
Route::post('carrito/{producto}/edit','CarritoController@cambiarCantidad')->name('carrito.modify');
Route::post('carrito/{producto}', 'CarritoController@delete')->name('carrito.destroy');

//perfil
Route::get('perfil','ProductosController@perfil');


Route::resource('archivo', 'ArchivoController', ['except' => ['create', 'edit', 'update']]);

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
