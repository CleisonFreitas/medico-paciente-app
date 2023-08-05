<?php

namespace App\Http\Controllers\Medico;

use App\Classes\Contracts\StoreMedicoContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MedicoStoreController extends Controller
{
    private StoreMedicoContract $storeMedicoRepository;

    public function __construct(StoreMedicoContract $storeMedicoRepository)
    {
        $this->storeMedicoRepository = $storeMedicoRepository;
    }

    /**
     * @param  \Illuminate\Http\Request  $request;
     * @return JsonResponse;
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $medico = $this->storeMedicoRepository->create($request->all());

            return response()->json([
                'data' => $medico,
            ], 201);
        } catch (\Exception $ex) {
            return response()->json($ex, 302);
        }
    }
}
