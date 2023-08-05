<?php

namespace App\Http\Controllers\Cidade;

use App\Classes\Contracts\ListCidadeMedicoContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CidadeMedicoController extends Controller
{
    private ListCidadeMedicoContract $listCidadeMedicoRepository;

    public function __construct(ListCidadeMedicoContract $listCidadeMedicoRepository)
    {
        $this->listCidadeMedicoRepository = $listCidadeMedicoRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function list(): JsonResponse
    {
        try {
            $lista = $this->listCidadeMedicoRepository->list();

            return response()->json([
                'data' => $lista,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json($ex, 404);
        }
    }
}
