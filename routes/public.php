<?php

use App\Http\Controllers\Cidade\ListCidadeController;
use Illuminate\Support\Facades\Route;

/* Lista de cidades */
Route::controller(ListCidadeController::class)->group(function () {
    Route::get('cidades', 'index');
});
