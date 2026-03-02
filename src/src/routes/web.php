<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\FazendaController;

Route::resource('veterinarios', VeterinarioController::class);
Route::resource('fazendas', FazendaController::class);

Route::get('/', function () {
    return view('welcome');
});
