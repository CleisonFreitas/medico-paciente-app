<?php

namespace App\Http\Controllers\Medico;

use App\Classes\Contracts\ListMedicoPacienteContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class ListMedicoPacienteController extends Controller
{
    private ListMedicoPacienteContract $repository;

    public function __construct(ListMedicoPacienteContract $repository)
    {
        $this->repository = $repository;
    }

    public function list(): JsonResponse
    {
        try {
            $lista = $this->repository->list();

            return response()->json([
                'data' => $lista,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json($ex, $ex->getCode());
        }
    }
}
