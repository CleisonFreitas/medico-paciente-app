<?php

declare(strict_types=1);

namespace App\Classes\DataObject;

class MedicoObject
{
    private String $nome;

    private String $especialidade;

    private Int $cidade_id;

    /**
     * @param  string  $nome;
     * @param  string  $especialidade;
     */
    public function __construct(string $nome, string $especialidade, int $cidade_id)
    {
        $this->nome = $nome;
        $this->especialidade = $especialidade;
        $this->cidade_id = $cidade_id;
    }

    /**
     * @return String;
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return String;
     */
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    /**
     * @return Int;
     */
    public function getCidadeId()
    {
        return $this->cidade_id;
    }
}
