<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Medico\MedicoStoreController;
use App\Http\Controllers\Paciente\StorePacienteController;
use App\Http\Controllers\Paciente\UpdatePacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::post('me', 'me');
    });

}

);

Route::middleware('jwt.verify')->group(function () {
    Route::get('/test', function () {
        return response()->json(['success!' => 'Welcome to the test zone!'], 200);
    });

    /* Medicos */
    Route::post('medicos', [MedicoStoreController::class, 'create']);

    /* Pacientes */
    Route::post('pacientes', [StorePacienteController::class, 'create']);
    Route::put('pacientes/{id_paciente}', [UpdatePacienteController::class, 'update']);
});

/* Public endpoints */
require __DIR__.'/public.php';
