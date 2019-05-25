<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //buscamos el id de nuestro usuario conectado
        $userId = \Auth::id();
        //buscamos todas sus compras
        $compras = DB::table('compras')
                    ->join('productos', 'compras.producto_id', '=', 'productos.id')
                    ->select('compras.*', 'productos.imagen',
                     'productos.nombre', 'productos.tipo')
                     ->get();
      //regresamos a la vista con sus compras
       return view('compras.index', compact('compras'));
    }
    public function ventas(){
      //buscamos el id de nuestro usuario conectado
        $userId = \Auth::id();
        //buscamos todas sus compras
        $compras = DB::table('compras')
                    ->join('productos', 'compras.producto_id', '=', 'productos.id')
                    ->select('compras.*', 'productos.imagen',
                     'productos.nombre', 'productos.tipo')
                     ->get();
      //regresamos a la vista con sus compras
       return view('compras.index', compact('compras'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //procuto comprar
    public function create()
    {
        return view('compras.comprar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
