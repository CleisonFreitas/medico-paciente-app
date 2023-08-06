<?php

declare(strict_types=1);

namespace App\Classes\Records;

use App\Models\Paciente\Paciente;

class UpdatePacienteRecord extends SaveRecords
{
    /**
     * @param  Paciente  $paciente;
     * @param  object  $pacienteObject;
     */
    public function execute(Paciente $paciente, object $pacienteObject)
    {
        $paciente->nome = $pacienteObject->getNome();
        $paciente->celular = $pacienteObject->getCelular();

        return $this->handler($paciente);
    }
}
