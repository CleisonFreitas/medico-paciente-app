<?php

namespace App\Classes\Repositories;

use App\Classes\Contracts\StoreMedicoContract;
use App\Classes\DataObject\MedicoObject;
use App\Classes\Records\MedicoRecord;
use App\Http\Resources\MedicoResource;
use App\Models\Medico\Medico;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreMedicoRepository implements StoreMedicoContract
{
    private MedicoRecord $record;

    private Medico $medico;

    /**
     * @param  Medico  $medico;
     * @param  MedicoRecord  $record;
     */
    public function __construct(Medico $medico, MedicoRecord $record)
    {
        $this->record = $record;
        $this->medico = $medico;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource;
     */
    public function create(array $data): JsonResource
    {
        $object = new MedicoObject(
            (string) $data['nome'],
            (string) $data['especialidade'],
            (int) $data['cidade_id']
        );

        $medico = $this->record->execute($this->medico, $object);

        return new MedicoResource($medico);
    }
}
