<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\ListUserContract;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ListUserRepository implements ListUserContract
{
    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function index(): JsonResource
    {
        return UserResource::collection(User::all());
    }
}
