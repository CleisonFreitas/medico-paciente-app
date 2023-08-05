<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\ListCidadeContract;
use App\Http\Resources\CidadeResource;
use App\Models\Cidade\Cidade;
use Illuminate\Http\Resources\Json\JsonResource;

class ListCidadeRepository implements ListCidadeContract
{
    public function index(): JsonResource
    {
        return CidadeResource::collection(Cidade::all());
    }
}
