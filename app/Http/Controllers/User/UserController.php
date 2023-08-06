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
     * @return \Illuminate\Http\JsonResponse;
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
