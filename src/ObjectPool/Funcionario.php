<?php

namespace Pattern\ObjectPool;


class Funcionario
{
    private $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}
