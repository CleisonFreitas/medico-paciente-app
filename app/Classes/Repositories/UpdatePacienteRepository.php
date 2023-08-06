<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\UpdatePacienteContract;
use App\Classes\DataObject\PacienteObject;
use App\Classes\Records\PacienteRecord;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente\Paciente;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdatePacienteRepository implements UpdatePacienteContract
{
    private PacienteRecord $record;

    /**
     * @param  PacienteRecord  $record;
     */
    public function __construct(PacienteRecord $record)
    {
        $this->record = $record;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function update(array $data): JsonResource
    {
        $id = request()->route('id_paciente');
        $object = new PacienteObject(
            $data['nome'],
            $data['cpf'],
            $data['celular']
        );
        $paciente = Paciente::find($id);

        $newRecord = $this->record->execute($paciente, $object);

        return new PacienteResource($newRecord);

    }
}
