<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarioController;

Route::resource('veterinarios', VeterinarioController::class);

Route::get('/', function () {
    return view('welcome');
});
