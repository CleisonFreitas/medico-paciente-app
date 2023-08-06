<?php

namespace App\Http\Controllers\Paciente;

use App\Classes\Contracts\UpdatePacienteContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdatePacienteController extends Controller
{
    private UpdatePacienteContract $repository;

    public function __construct(UpdatePacienteContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $paciente = $this->repository->update($request->all());

            return response()->json([
                'data' => $paciente,
            ], 201);

        } catch (\Exception $ex) {
            return response()->json($ex, 404);
        }
    }
}
