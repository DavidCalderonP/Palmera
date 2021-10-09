<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrediosController;

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

Route::resource('predio', PrediosController::class);
//Route::get('predio', [\App\Http\Controllers\PrediosController::class, 'index']);
//Route::post('predio', [\App\Http\Controllers\PrediosController::class, 'store']);

