<?php

namespace App\Classes\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface ListCidadeMedicoContract
{
    public function list(): JsonResource;
}
