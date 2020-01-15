<?php

namespace Pattern\FactoryMethod\Async;


use Pattern\FactoryMethod;

class EmissorJMS extends FactoryMethod\EmissorJMS
{
    public function envia(string $mensagem)
    {
        echo "Enviando por JMS (async) a mensagem: $mensagem <br />";
    }
}
