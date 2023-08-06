<?php

namespace App\Classes\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface ListMedicoPacienteContract
{
    public function list(): JsonResource;
}
