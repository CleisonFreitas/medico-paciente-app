<?php

declare(strict_types=1);

namespace App\Classes\Repositories;

use App\Classes\Contracts\StorePacienteContract;
use App\Classes\DataObject\PacienteObject;
use App\Classes\Records\PacienteRecord;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente\Paciente;
use Illuminate\Http\Resources\Json\JsonResource;

class StorePacienteRepository implements StorePacienteContract
{
    private PacienteRecord $record;

    private Paciente $paciente;

    public function __construct(Paciente $paciente, PacienteRecord $record)
    {
        $this->record = $record;
        $this->paciente = $paciente;
    }

    /**
     * @param  array  $data;
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function create(array $data): JsonResource
    {
        $object = new PacienteObject(
            (string) $data['nome'],
            (string) $data['cpf'],
            (string) $data['celular']
        );

        $paciente = $this->record->execute($this->paciente, $object);

        return new PacienteResource($paciente);
    }
}
