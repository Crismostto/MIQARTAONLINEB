<?php

use App\Http\Controllers\HistoricoMesaController;
use App\Http\Controllers\HistoricoMesaPedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaPedidoController;
use App\Models\HistoricoMesa;

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

Route::Resource('pedidos', MesaPedidoController::class);

Route::get('pedidos/mesa/{id}',[MesaPedidoController::class, 'lista'],function($id){
        return $id;
});

Route::post('cierre',[MesaPedidoController::class, 'cierreTotal']);

Route::Resource('historico/mesas', HistoricoMesaController::class);
Route::get('historico/mesas/comparacionFecha',[ HistoricoMesaController::class , 'compararFechas']);

Route::get('historico/pedidos/{id}',[HistoricoMesaPedidoController::class, 'lista'],function($id){
    return $id;
});

Route::Resource('historico/pedidos', HistoricoMesaPedidoController::class);



