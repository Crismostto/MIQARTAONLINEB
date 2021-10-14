<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ArticuloCategoriaController;
use Illuminate\Support\Facades\Route;



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


Route::Resource('articulos/categorias', ArticuloCategoriaController::class);
Route::Resource('articulos', ArticuloController::class);
Route::Resource('mesas', MesaController::class);

