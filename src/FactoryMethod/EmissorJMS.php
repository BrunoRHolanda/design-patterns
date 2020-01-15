<?php

namespace Pattern\FactoryMethod;


use Pattern\FactoryMethod\IEmissor;

class EmissorJMS implements IEmissor
{
    public function envia(string $mensagem)
    {
        echo "Enviando por JMS a mensagem: $mensagem <br />";
    }
}