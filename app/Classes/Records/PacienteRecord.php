<?php

declare(strict_types=1);

namespace App\Classes\Records;

use App\Models\Paciente\Paciente;

class PacienteRecord extends SaveRecords
{
    /**
     * @param  Paciente  $paciente;
     */
    public function execute(Paciente $paciente, object $pacienteObject)
    {
        $paciente->nome = $pacienteObject->getNome();
        $paciente->cpf = $pacienteObject->getCpf();
        $paciente->celular = $pacienteObject->getCelular();

        return $this->handler($paciente);
    }
}
