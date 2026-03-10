<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\FazendaController;
use App\Http\Controllers\GadoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AppController;



Route::resource('gados', GadoController::class)->except(['show']);
Route::resource('veterinarios', VeterinarioController::class);
Route::resource('fazendas', FazendaController::class);
//Route::resource('gados', GadoController::class);
//Route::get('/relatorios/leite', [RelatorioController::class, 'leitePorFazenda']);
//Route::get('/relatorios/racao', [RelatorioController::class, 'racaoPorFazenda']);
Route::get('/relatorios/leite', [RelatorioController::class, 'leitePorFazenda'])->name('relatorios.leite');
Route::get('/relatorios/racao', [RelatorioController::class, 'racaoPorFazenda'])->name('relatorios.racao');
Route::get('/relatorios/abate', [RelatorioController::class, 'abatePeriodo'])->name('relatorios.abate');
Route::get('/relatorios/consumo', [RelatorioController::class, 'jovensAltoConsumo'])->name('relatorios.consumo');
Route::get('/relatorios/animais', [RelatorioController::class, 'animaisPorFazenda']);
Route::get('/relatorios', [RelatorioController::class, 'index'])
    ->name('relatorios.index');

Route::get('/laravel-farm', [AppController::class, 'index'])
    ->name('app');
    
Route::get('/', [AppController::class, 'index'])->name('app');

Route::post('/gados/{id}/abater', [GadoController::class, 'abater'])
    ->name('gados.abater');

Route::get('/gados/abate', [GadoController::class, 'paraAbate'])
    ->name('gados.abate');

/*Route::get('/', function () {
    return view('welcome');
});
*/