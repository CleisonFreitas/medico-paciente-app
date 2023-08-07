<?php

namespace App\Http\Controllers\Medico;

use App\Classes\Contracts\SyncMedicoPacienteContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

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
     * @OA\Post(
     *     path="/medicos/{id_medico}/pacientes",
     *     summary="Vincula um paciente a um médico",
     *     tags={"vincular médicos x pacientes"},
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
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="medico_id", type="integer", example=1),
     *             @OA\Property(property="paciente_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Paciente vinculado ao médico com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="medico", ref="#/components/schemas/Medico"),
     *                 @OA\Property(property="paciente", ref="#/components/schemas/Paciente")
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
     * @OA\Schema(
     *     schema="Paciente",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="nome", type="string", example="Fábio Gonzales"),
     *     @OA\Property(property="cpf", type="string", example="795.429.941-60"),
     *     @OA\Property(property="celular", type="string", example="(11) 98484-6332"),
     *     @OA\Property(property="created_at", type="string", format="date-time"),
     *     @OA\Property(property="updated_at", type="string", format="date-time"),
     *     @OA\Property(property="deleted_at", type="string", format="date-time", nullable=true)
     * )
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
