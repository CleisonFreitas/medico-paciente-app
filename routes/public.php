<?php

use App\Http\Controllers\Cidade\ListCidadeController;
use App\Http\Controllers\Medico\ListMedicoController;
use Illuminate\Support\Facades\Route;

/* Lista de cidades */
Route::controller(ListCidadeController::class)->group(function () {
    Route::get('cidades', 'index');
});

/* Lista de medicos*/
Route::controller(ListMedicoController::class)->group(function () {
    Route::get('medicos', 'index');
});
