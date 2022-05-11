<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Categoria;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo"aqui va a ir el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar las marcas en bd: Model Marca
        $marcas = Marca::all();
        //Seleccionar las marcas en bd: Model Marca
        $categorias = Categoria::all();
        //mostrar el formulario,enviado los datos
        return view('productos.create')
               ->with("marcas" , $marcas)
               ->with("categorias" , $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        var_dump($request->all());
        //crear una entidad <<producto>>
        $p = new producto();
        $p->nombre=$request->nombre;
        $p->desc=$request->desc;
        $p->precio=$request->precio;
        $p->marca_id=$request->marca;
        $p->categoria_id=$request->categorias;
        $p->save();
        echo"producto registro";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo"va a mostrar el detalle de producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        echo"aqui se muestra el formulario de editar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        echo"guarda el producto editado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        echo"para eliminar el producto";
    }
}
