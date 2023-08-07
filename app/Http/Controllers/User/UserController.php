<?php

namespace App\Http\Controllers\User;

use App\Classes\Contracts\ListUserContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private ListUserContract $repository;

    public function __construct(ListUserContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Retorna a lista de todos os usuários cadastrados",
     *     tags={"lista de usuários autenticados"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de usuários cadastrados",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="nome", type="string", example="Prof. Cicero Lind"),
     *                     @OA\Property(property="email", type="string", example="devonte79@yahoo.com"),
     *                     @OA\Property(property="created_at", type="string", format="date-time"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time")
     *                 )
     *             )
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
     *         response=401,
     *         description="Unauthorized - A autenticação é obrigatória",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *     )
     * )
     */

    public function index(): JsonResponse
    {
        try {
            $users = $this->repository->index();

            return response()->json([
                'data' => $users,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json($ex, $ex->getCode());
        }
    }
}
