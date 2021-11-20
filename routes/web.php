<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrediosController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('predio', PrediosController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
