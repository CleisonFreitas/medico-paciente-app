<?php

declare(strict_types=1);

namespace App\Classes\Records;

use App\Models\Medico\Medico;

class MedicoRecord extends SaveRecords
{
    /**
     * @param  Medico  $medico;
     */
    public function execute(Medico $medico, object $medicoObject)
    {
        $medico->nome = $medicoObject->getNome();
        $medico->especialidade = $medicoObject->getEspecialidade();
        $medico->cidade_id = $medicoObject->getCidadeId();

        return $this->handler($medico);
    }
}
