<?php

declare(strict_types=1);

namespace App\Http\Controllers\Cidade;

use App\Classes\Contracts\ListCidadeContract;
use App\Classes\Repositories\ListCidadeRepository;
use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;
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

    /**
     * @OA\Get(
     *     path="/cidades",
     *     summary="Lista todas as cidades cadastradas",
     *     tags={"listar cidades"},
     *     @OA\Response(
     *         response=200,
     *         description="Retorna a lista de todas as cidades cadastradas",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Cidade")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno no servidor",
     *     )
     * )
     * @OA\Schema(
     *     schema="Cidade",
     *     @OA\Property(
     *         property="id",
     *         type="integer",
     *         example=1
     *     ),
     *     @OA\Property(
     *         property="nome",
     *         type="string",
     *         example="North Danykamouth"
     *     ),
     *     @OA\Property(
     *         property="estado",
     *         type="string",
     *         example="Wyoming"
     *     )
     * )
     */
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
