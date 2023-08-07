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
     * @OA\Get(
     *     path="/cidades/{id_cidade}/medicos",
     *     summary="Lista todos os médicos cadastrados de uma cidade",
     *     tags={"cidades/médicos"},
     *     @OA\Parameter(
     *         name="id_cidade",
     *         in="path",
     *         required=true,
     *         description="ID da cidade",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Retorna a lista de todos os médicos cadastrados",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CidadeMedico")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno no servidor",
     *     )
     * )
     *
     * @OA\Schema(
     *     schema="CidadeMedico",
     *     @OA\Property(
     *         property="id",
     *         type="integer",
     *         example=1
     *     ),
     *     @OA\Property(
     *         property="nome",
     *         type="string",
     *         example="Dra. Alessandra Moura"
     *     ),
     *     @OA\Property(
     *         property="especialidade",
     *         type="string",
     *         example="Neurologista"
     *     ),
     *     @OA\Property(
     *         property="created_at",
     *         type="string",
     *         format="date-time"
     *     ),
     *     @OA\Property(
     *         property="updated_at",
     *         type="string",
     *         format="date-time"
     *     ),
     *     @OA\Property(
     *         property="cidade",
     *         type="object",
     *         ref="#/components/schemas/Cidade"
     *     )
     * )
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
