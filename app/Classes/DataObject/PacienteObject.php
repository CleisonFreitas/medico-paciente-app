<?php

declare(strict_types=1);

namespace App\Classes\DataObject;

class PacienteObject
{
    private String $nome;

    private String $cpf;

    private String $celular;

    /**
     * @param  string  $nome;
     * @param  string  $cpf;
     */
    public function __construct(string $nome, string $cpf, string $celular)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return String;
     */
    public function getCelular()
    {
        return $this->celular;
    }
}
