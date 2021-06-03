<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriasController;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::apiResource('/materias', MateriasController::class);

Route::delete('materias/delete/{id}', 'App\Http\Controllers\MateriasController@destroy');