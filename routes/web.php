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
Route::get('carrito',function(){
  return view('carrito.index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
