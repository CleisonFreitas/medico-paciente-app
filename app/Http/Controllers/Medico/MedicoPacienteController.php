<?php

namespace App\Http\Controllers\Medico;

use App\Classes\Contracts\SyncMedicoPacienteContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MedicoPacienteController extends Controller
{
    private SyncMedicoPacienteContract $repository;

    /**
     * @param  SyncMedicoPacienteContract  $repository;
     */
    public function __construct(SyncMedicoPacienteContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function sync(Request $request): JsonResponse
    {
        try {
            $relation = $this->repository->sync($request->all());

            return response()->json([
                'data' => $relation,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json($ex, 404);
        }
    }
}
