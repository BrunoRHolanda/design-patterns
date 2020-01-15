<?php

namespace Pattern\FactoryMethod;


use Pattern\FactoryMethod\IEmissor;

class EmissorEmail implements IEmissor
{
    public function envia(string $mensagem)
    {
        echo "Enviando por Email a mensagem: $mensagem <br />";
    }
}