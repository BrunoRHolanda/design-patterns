<?php

namespace Pattern\FactoryMethod\Async;


use Pattern\FactoryMethod;

class EmissorSMS extends FactoryMethod\EmissorSMS
{
    public function envia(string $mensagem)
    {
        echo "Enviando por SMS (async) a mensagem: $mensagem <br />";
    }
}