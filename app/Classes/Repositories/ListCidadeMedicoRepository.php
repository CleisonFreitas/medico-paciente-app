<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\ListCidadeMedicoContract;
use App\Http\Resources\MedicoResource;
use App\Models\Cidade\Cidade;
use Illuminate\Http\Resources\Json\JsonResource;

class ListCidadeMedicoRepository implements ListCidadeMedicoContract
{
    public function list(): JsonResource
    {
        $id = request()->route('id_cidade');

        $cidade = Cidade::find($id)->medicos;

        return MedicoResource::collection($cidade);

    }
}
