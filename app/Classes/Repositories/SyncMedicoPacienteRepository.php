<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\SyncMedicoPacienteContract;
use App\Http\Resources\MedicoPacienteResource;
use App\Models\Medico\Medico;
use App\Models\Paciente\Paciente;
use Illuminate\Http\Resources\Json\JsonResource;
use stdClass;

class SyncMedicoPacienteRepository implements SyncMedicoPacienteContract
{
    /**
     * @param  array  $data;
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function sync(array $data): JsonResource
    {
        $medico = Medico::find($data['medico_id']);
        $paciente = Paciente::find($data['paciente_id']);

        $medico->pacientes()->syncWithoutDetaching($paciente->id);

        $relation = new stdClass;
        $relation->medico = $medico;
        $relation->paciente = $paciente;

        return new MedicoPacienteResource($relation);
    }
}
