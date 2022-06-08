<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionar todos los productos en un arreglo
        $productos = Producto::all();
        //mostrar la vista del catalogo, llevandole los productos
        return view('productos.index')
                ->with('productos' , $productos);
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
    public function store(StoreProductoRequest $request)
    {
        
        
            //validacion exitosa
            $p = new producto();
            $p->nombre=$request->nombre;
            $p->desc=$request->desc;
            $p->precio=$request->precio;
            $p->marca_id=$request->marca;
            $p->categoria_id=$request->categorias;
            //objeto file
            $archivo = $request->imagen;
            $p->imagen = $archivo->getClientOriginalName();
            //ruta donde se almacena el archivo
            $ruta = public_path()."/img";
            //movemos archivo a ruta
            $archivo->move( $ruta,
                            $archivo->getClientOriginalName());
            $p->save();
            return redirect('productos/create')
                    ->with('mensaje' , "producto registrado exitosamente");
    }
        
        //crear una entidad <<producto>>
        /*$p = new producto();
        $p->nombre=$request->nombre;
        $p->desc=$request->desc;
        $p->precio=$request->precio;
        $p->marca_id=$request->marca;
        $p->categoria_id=$request->categorias;
        $p->save();
        //redireccionar: a una ruta disponible
        return redirect('productos/create')
            ->with('mensaje' , "producto registrado exitosamente");*/


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        $p =Producto::find($producto);
        return view('productos.details')
                    ->with('producto' , $p);
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
