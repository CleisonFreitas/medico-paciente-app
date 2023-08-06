<?php

namespace App\Http\Controllers\Paciente;

use App\Classes\Contracts\StorePacienteContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StorePacienteController extends Controller
{
    private StorePacienteContract $repository;

    public function __construct(StorePacienteContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $paciente = $this->repository->create($request->all());

            return response()->json([
                'data' => $paciente,
            ], 201);

        } catch (\Exception $ex) {
            return response()->json($ex, 404);
        }
    }
}
