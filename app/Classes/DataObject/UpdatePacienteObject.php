<?php

declare(strict_types=1);

namespace App\Classes\DataObject;

class UpdatePacienteObject
{
    private String $nome;

    private String $celular;

    /**
     * @param  string  $nome;
     * @param  string  $celular;
     */
    public function __construct(string $nome, string $celular)
    {
        $this->nome = $nome;
        $this->celular = $celular;
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
    public function getCelular()
    {
        return $this->celular;
    }
}
