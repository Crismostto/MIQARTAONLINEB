<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaPedidoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::Resource('pedidos', MesaPedidoController::class);
Route::Resource('pedidos', MesaPedidoController::class);

Route::get('pedidos/lista/{id}',[MesaPedidoController::class, 'lista'],function($id){
        return $id;
});

Route::post('mesas/cierre/{id}',[MesaPedidoController::class, 'cierreMesa'],function($id){
    return $id;
});

Route::post('pedidos/cierre/{id}',[MesaPedidoController::class, 'cierrePedido'],function($id){
    return $id;
});
