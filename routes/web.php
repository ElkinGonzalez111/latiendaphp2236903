<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('welcome');
});

//primera ruta
//Clase Roue->metodo get
Route::get('hola' , function(){
   echo "Hola le dijo la araña a la mosca";
});


Route::get('prueba' , function(){
       return view('productos.create');
});

/**
 * Rutas REST Producto
 * 
 */
Route::resource('productos', 
            ProductoController::class);
Route::resource('cart', CartController::class,['only' => ['index','store','dstroy']]);
