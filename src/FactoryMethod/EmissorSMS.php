<?php

namespace Pattern\FactoryMethod;


use Pattern\FactoryMethod\IEmissor;

class EmissorSMS implements IEmissor
{
    public function envia(string $mensagem)
    {
        echo "Enviando por SMS a mensagem: $mensagem <br />";
    }
}