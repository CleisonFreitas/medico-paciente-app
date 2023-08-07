<?php

namespace App\Http\Controllers\Paciente;

use App\Classes\Contracts\UpdatePacienteContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdatePacienteController extends Controller
{
    private UpdatePacienteContract $repository;

    public function __construct(UpdatePacienteContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Put(
     *     path="/pacientes/:id_paciente",
     *     summary="Cadastra um novo paciente",
     *     tags={"atualizar pacientes"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nome", type="string", example="Matheus Henrique"),
     *             @OA\Property(property="celular", type="string", example="(11) 9 8432-5789")
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
     *         description="paciente atualizado com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=3),
     *                 @OA\Property(property="nome", type="string", example="Matheus Henrique"),
     *                 @OA\Property(property="cpf", type="string", example="795.429.941-60"),
     *                 @OA\Property(property="celular", type="string", example="(11) 9 8432-5789"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
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
    public function update(Request $request): JsonResponse
    {
        try {
            $paciente = $this->repository->update($request->all());

            return response()->json([
                'data' => $paciente,
            ], 201);
        } catch (\Exception $ex) {
            return response()->json($ex, 404);
        }
    }
}
