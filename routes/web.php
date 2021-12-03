<?php


use App\Http\Controllers\ActPredOrgController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrediosController;

Route::get('/home', function () {
    return view('home/isHome');
});

Route::resource('predio', PrediosController::class)->names(['predio']);
Route::resource('asignarActividades', ActPredOrgController::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
