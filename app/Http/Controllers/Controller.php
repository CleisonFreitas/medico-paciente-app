<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *   title="API medico-paciente-app",
 *   version="1.0.0",
 *   description="O objetivo desta API é listar médicos e seus pacientes, divididos por cidade.",
 *   @OA\Contact(
 *     email="cleison.npi@gmail.com"
 *   )
 * )
 * @OA\Server(
 *      description="Ambiente de Desenvolvimento",
 *      url="http://localhost/api/"
 * ),
 * @OA\Get(
 *     path="/test",
 *     description="Área de teste",
 *     @OA\Parameter(
 *         name="token",
 *         in="query",
 *         required=false,
 *         description="Bearer token para autenticação",
 *         @OA\Schema(
 *             type="string",
 *         )
 *     ),
 *     @OA\Response(response="default", description="Teste de validação"),
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
