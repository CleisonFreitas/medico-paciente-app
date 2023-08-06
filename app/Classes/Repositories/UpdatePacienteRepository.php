<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\UpdatePacienteContract;
use App\Classes\DataObject\UpdatePacienteObject;
use App\Classes\Records\UpdatePacienteRecord;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente\Paciente;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdatePacienteRepository implements UpdatePacienteContract
{
    private UpdatePacienteRecord $record;

    /**
     * @param  UpdatePacienteRecord  $record;
     */
    public function __construct(UpdatePacienteRecord $record)
    {
        $this->record = $record;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function update(array $data): JsonResource
    {
        $id = request()->route('id_paciente');
        $object = new UpdatePacienteObject(
            $data['nome'],
            $data['celular']
        );
        $paciente = Paciente::find($id);

        $updateRecord = $this->record->execute($paciente, $object);

        return new PacienteResource($updateRecord);

    }
}
