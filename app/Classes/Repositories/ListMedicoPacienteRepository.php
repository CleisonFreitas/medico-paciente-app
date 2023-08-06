<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\ListMedicoPacienteContract;
use App\Http\Resources\PacienteResource;
use App\Models\Medico\Medico;
use Illuminate\Http\Resources\Json\JsonResource;

class ListMedicoPacienteRepository implements ListMedicoPacienteContract
{
    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function list(): JsonResource
    {
        $id = request()->route('id_medico');

        $pacientes = Medico::find($id)->pacientes;

        return PacienteResource::collection($pacientes);

    }
}
