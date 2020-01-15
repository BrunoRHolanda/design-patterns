<?php

namespace Pattern\Decorator;


use Pattern\Decorator;

abstract class EmissorDecorator implements Emissor
{
    private $emissor;

    public function __construct(Emissor $emissor)
    {
        $this->emissor = $emissor;
    }

    public abstract function envia(string $mensagem);

    public function getEmissor(): Emissor
    {
        return $this->emissor;
    }
}