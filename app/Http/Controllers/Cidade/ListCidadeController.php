<?php

declare(strict_types=1);

namespace App\Http\Controllers\Cidade;

use App\Classes\Contracts\ListCidadeContract;
use App\Classes\Repositories\ListCidadeRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ListCidadeController extends Controller
{
    private ListCidadeContract $listCidadeRepository;

    /**
     * @param  ListCidadeRepository  $listCidadeContract
     */
    public function __construct(ListCidadeContract $listCidadeRepository)
    {
        $this->listCidadeRepository = $listCidadeRepository;
    }

    public function index(): JsonResponse
    {
        try {
            $cidades = $this->listCidadeRepository->index();

            return response()->json([
                'data' => $cidades,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json($ex, 404);
        }
    }
}
