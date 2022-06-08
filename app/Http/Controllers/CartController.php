<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session('cart')){
            echo "no hay  items  en el escritorio";
        }else{
            return view('cart.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = [ [
                            "prod_id" => $request->prod_id ,
                            "cantidad" => $request->cantidad,
                            "nombre_prod" => Producto::find($request->prod_id)->nombre
                          ]
                    ];

        
        if( !session('cart') ){
            //1.el primer producto  en el carrito
            $aux[] = $producto;

            session(['cart' => $aux]);

        }else{

            $producto = [
                "prod_id" => $request->prod_id ,
                "cantidad" => $request->cantidad ,
                "nombre_prod" => Producto::find($request->prod_id)->nombre
            ]

            //- extrer  los datos  del carrito  de la variable  de sesion
            $aux  = session('cart');
            //- eliminar la variable  se sesion:
            session()->forget('cart'); 
            //- agregar  el nuevo  producto  a los ya  existentes
            $aux[] = $producto;
            // - volver  a crear la variable  de session  con el nuevo  producto 
            session(['cart' => $aux]);

        }
        //redireccion al catalogo  de productos
        //con mensaje  de añadadido  al carrito 
        return redirect('productos')
        ->with("mensajito" , "producto añadido");
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session()->forget('cart');
    }
}