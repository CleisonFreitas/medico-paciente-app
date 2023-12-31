<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Medico\ListMedicoPacienteController;
use App\Http\Controllers\Medico\MedicoPacienteController;
use App\Http\Controllers\Medico\MedicoStoreController;
use App\Http\Controllers\Paciente\StorePacienteController;
use App\Http\Controllers\Paciente\UpdatePacienteController;
use App\Http\Controllers\User\UserController;
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
], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
    });

}

);

Route::middleware('jwt.verify')->group(function () {
    Route::get('/test', function () {
        return response()->json(['success!' => 'Welcome to the test zone!'], 200);
    });

    /* Medicos */
    Route::post('medicos', [MedicoStoreController::class, 'create']);
    Route::post('medicos/{id_medico}/pacientes', [MedicoPacienteController::class, 'sync']);
    Route::get('medicos/{id_medico}/pacientes', [ListMedicoPacienteController::class, 'list']);

    /* Pacientes */
    Route::post('pacientes', [StorePacienteController::class, 'create']);
    Route::put('pacientes/{id_paciente}', [UpdatePacienteController::class, 'update']);

    /* Users */
    Route::get('users', [UserController::class, 'index']);
});

/* Public endpoints */
require __DIR__.'/public.php';
