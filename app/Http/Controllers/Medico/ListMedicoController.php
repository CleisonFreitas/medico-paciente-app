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
     * @return \Illuminate\Http\JsonResponse;
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
