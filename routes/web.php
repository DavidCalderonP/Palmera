<?php


use App\Http\Controllers\ActPredOrgController;
use App\Http\Controllers\ActPredNoOrgController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrediosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentasController;

Route::get('/home', function () {
    return view('home/isHome');
});

Route::resource('predio', PrediosController::class)->names(['predio']);
Route::resource('asignarActividades', ActPredOrgController::class);
Route::resource('asignarActividadesPredNoOrg', ActPredNoOrgController::class);
Route::resource('productos', ProductosController::class);
Route::resource('carrito', CarritoController::class);
Route::resource('compra', VentasController::class);
Route::post('productos/search',[ProductosController::class, 'searchProductos']);
Route::get('tarjeta', function () {
    return view('compra/registroTarjeta');
});
//Route::post('registrarVenta', [VentasController::class, 'registrarVenta']);
Route::post('verificartarjeta', [VentasController::class, 'validaTDC']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
