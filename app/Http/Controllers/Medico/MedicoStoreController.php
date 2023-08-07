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
     * @OA\Post(
     *     path="/medicos",
     *     summary="Cadastra um novo médico",
     *     tags={"cadastar médicos"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nome", type="string", example="Dra. Alessandra Moura"),
     *             @OA\Property(property="especialidade", type="string", example="Neurologista"),
     *             @OA\Property(property="cidade_id", type="integer", example=3)
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="token",
     *         in="query",
     *         required=false,
     *         description="Bearer token para autenticação",
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Novo médico cadastrado com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=3),
     *                 @OA\Property(property="nome", type="string", example="Dra. Alessandra Moura"),
     *                 @OA\Property(property="especialidade", type="string", example="Neurologista"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time"),
     *                 @OA\Property(property="cidade", ref="#/components/schemas/Cidade")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - A autenticação é obrigatória",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *     )
     * )
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
