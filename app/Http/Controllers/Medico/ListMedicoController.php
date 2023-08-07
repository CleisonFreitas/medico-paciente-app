<?php

namespace App\Http\Controllers\Medico;

use App\Classes\Contracts\ListMedicoContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ListMedicoController extends Controller
{
    private ListMedicoContract $listMedicoRepository;

    /**
     * @return void;
     */
    public function __construct(ListMedicoContract $listMedicoRepository)
    {
        $this->listMedicoRepository = $listMedicoRepository;
    }

    /**
     * @OA\Get(
     *     path="/medicos",
     *     summary="Lista todos os médicos cadastrados",
     *     tags={"listar médicos"},
     *     @OA\Response(
     *         response=200,
     *         description="Retorna a lista de todos os médicos cadastrados",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Medico")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno no servidor",
     *     )
     * )
     * @OA\Schema(
     *     schema="Medico",
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


    public function index(): JsonResponse
    {
        try {
            $repository = $this->listMedicoRepository->index();

            return response()->json([
                'data' => $repository,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json($ex, 404);
        }
    }
}
