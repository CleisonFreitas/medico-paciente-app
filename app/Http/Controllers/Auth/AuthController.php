<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => 'login']);
    }

    /**
     * @OA\Post(
     *     path="/login",
     *     summary="Forneça um login e senha para obter o token de acesso",
     *     tags={"autenticação"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="email", type="string", example="cleison51@hotmail.com"),
     *             @OA\Property(property="password", type="string", example="your_password_here")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful login",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="user", ref="#/components/schemas/User"),
     *             @OA\Property(property="authorization", ref="#/components/schemas/Authorization")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Invalid credentials",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *     )
     * )
     * @OA\Schema(
     *     schema="User",
     *     @OA\Property(property="id", type="integer", example=3),
     *     @OA\Property(property="name", type="string", example="cleison"),
     *     @OA\Property(property="email", type="string", example="cleison51@hotmail.com"),
     *     @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true),
     *     @OA\Property(property="created_at", type="string", format="date-time"),
     *     @OA\Property(property="updated_at", type="string", format="date-time"),
     *     @OA\Property(property="deleted_at", type="string", format="date-time", nullable=true)
     * )
     *
     * @OA\Schema(
     *     schema="Authorization",
     *     @OA\Property(property="token", type="string", example="your_access_token_here"),
     *     @OA\Property(property="type", type="string", example="bearer"),
     *     @OA\Property(property="expires_in", type="integer", example=3600)
     * )
     */

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60,
            ],
        ]);
    }
}
