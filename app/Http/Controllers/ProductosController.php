<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Carrito;
use App\User;

use Storage;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      // dd(Storage::url('playeras/mCtMFl3ZGkbhN0FJZNvDNI1cllFFfHiloXjNcvBF.jpeg'));
      if(!empty($request->tipo) || !empty($request->ordenamiento)){

      if($request->ordenamiento == "1"){
                  $productos =  Producto::order('created_at', 'desc')->paginate(10);
              }
      if($request->ordenamiento == "2"){
                  $productos = Producto::order('num_ventas', 'desc')->paginate(10);
              }
      if($request->ordenamiento == "3"){
                  $productos = Producto::order('precio', 'asc')->paginate(10);
              }
      if($request->ordenamiento == "4"){
                  $productos = Producto::order('precio', 'desc')->paginate(10);
              }

      if($request->Min != '' && $request->Max != '' ){
           $productos = Producto::whereBetween('precio', [$request->Min, $request->Max])->paginate(10)->get();
          }
      }
     else{
           $productos = Producto::paginate(10);
      }

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
      // dd($request->file('image'));
      $request->validate([
            'nombre' => 'required|max:40',
            'tipo' => 'required|min:1|max:10',
            'precio' => 'required|min:1|max:10000',
            'talla' => 'required|min:1|max:100',
            'imagen' => 'required|image',
        ]);

        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->sexo = $request->sexo;
        $producto->user_id = Auth::user()->id;
        $producto->tipo = $request->tipo;
        $producto->precio = $request->precio;
        $producto->talla = $request->talla;
        $producto->num_ventas = 0;
        $producto->calificacion = 0;
        $producto->imagen = $request->file('image')->store('public');
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

//eager load
    public function perfil(){
      $userId = \Auth::id();
      $user = User::with('productos')->find(1);
      return view('perfil.index',compact('user'));
    }
}
