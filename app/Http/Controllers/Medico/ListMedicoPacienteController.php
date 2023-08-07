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

    /**
     * @OA\Get(
     *     path="/medicos/{id_medico}/pacientes",
     *     summary="Lista todos os pacientes vinculados a um médico",
     *     tags={"listar médicos x pacientes"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id_medico",
     *         in="path",
     *         required=true,
     *         description="ID do médico",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *             example=1
     *         ),
     *
     *      ),
     *      @OA\Parameter(
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
     *         description="Retorna a lista de todos os pacientes vinculados ao médico",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="nome", type="string", example="Fábio Gonzales"),
     *                     @OA\Property(property="cpf", type="string", example="795.429.941-60"),
     *                     @OA\Property(property="celular", type="string", example="(11) 98484-6332"),
     *                     @OA\Property(property="created_at", type="string", format="date-time"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time")
     *                 )
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
     *
     * @OA\SecurityScheme(
     *     type="http",
     *     securityScheme="bearerAuth",
     *     scheme="bearer",
     *     bearerFormat="JWT",
     * )
     */

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
