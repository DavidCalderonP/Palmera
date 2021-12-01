<?php


use App\Http\Controllers\ActPredOrgController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrediosController;

//DB::listen(function($query){
//    var_dump($query->sql);
//});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('predio', PrediosController::class)->names(['predio']);
Route::resource('asignarActividades', ActPredOrgController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
