<?php

namespace Pattern\FactoryMethod\Async;


use Pattern\FactoryMethod;

class EmissorEmail extends FactoryMethod\EmissorEmail
{
    public function envia(string $mensagem)
    {
        echo "Enviando por Email (async) a mensagem: $mensagem <br />";
    }
}