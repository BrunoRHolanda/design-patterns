<?php

namespace Pattern\Prototype;


use DateTime;

use Pattern\Prototype\IPrototype;

class Campanha implements IPrototype 
{
    private $nome;
    
    private $vencimento;

    private $palavrasChave;

    public function __construct(string $nome, DateTime $vencimento, array $palavrasChave)
    {
        $this->nome = $nome;

        $this->vencimento = $vencimento;

        $this->palavrasChave = $palavrasChave;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getVencimento(): DateTime
    {
        return $this->vencimento;
    }

    public function getPalavrasChave(): array
    {
        return $this->palavrasChave;
    }

    public function clone()
    {
        $nome = "Cópia da Campanha: {$this->nome}";

        $vencimento = clone $this->vencimento;

        $palavrasChave  = $this->palavrasChave;

        return new Campanha($nome, $vencimento, $palavrasChave);
    }

    public function toString(): string
    {
        $str = "<pre>";
        $str .= "-----------------------------------------------------\n";
        $str .= "Nome da Campanha: {$this->nome}\n";
        $str .= "Vencimento: {$this->vencimento->format("d/m/Y H:i:s")}\n";
        $str .= "Palavras Chave: " . implode(',', $this->palavrasChave) . "\n";
        $str .= "-----------------------------------------------------\n";
        $str .= "</pre>";

        return $str;
    }
}