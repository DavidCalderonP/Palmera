<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrediosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentasController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('predio', PrediosController::class);
Route::resource('productos', ProductosController::class);
Route::resource('carrito', CarritoController::class);
Route::resource('compra', VentasController::class);
Route::get('tarjeta', function () {
    return view('compra/registroTarjeta');
});
Route::post('verificartarjeta', [VentasController::class, 'validaTDC']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
