<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\ListMedicoContract;
use App\Http\Resources\MedicoResource;
use App\Models\Medico\Medico;
use Illuminate\Http\Resources\Json\JsonResource;

class ListMedicoRepository implements ListMedicoContract
{
    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function index(): JsonResource
    {
        return MedicoResource::collection(Medico::all());
    }
}
