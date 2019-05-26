<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Carrito;

use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $productos = Producto::all();

        return view("productos.index", ["productos" => $productos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto;
        return view("productos.crear", ["producto" => $producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->user_id = Auth::user()->id;
        $producto->imagen = "miImagen";
        $producto->tipo = $request->tipo;
        $producto->precio = $request->precio;
        $producto->talla = $request->talla;
        $producto->num_ventas = 0;
        $producto->calificacion = 0;

        if($producto->save()){
           return redirect("/productos");
        }else{
            return view("productos.create", ["producto" => $producto]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view("productos.mostrar", ["producto" => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $producto = Producto::find($id);
        return view("productos.editar", ["producto" => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->imagen = "miImagen";
        $producto->tipo = $request->tipo;
        $producto->precio = $request->precio;
        $producto->talla = $request->talla;
        $producto->num_ventas = 0;
        $producto->calificacion = 0;

        if($producto->save()){
           return redirect("/productos");
        }else{
            return view("productos.edit", ["producto" => $producto]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect('/productos');
    }
}
