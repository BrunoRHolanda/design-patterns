<?php

namespace Pattern\AbstractFactory;


use Pattern\AbstractFactory\IEmissor;

class EmissorVisa implements IEmissor
{
    public function envia(string $mensagem)
    {
        echo "Enviando a seguinte mensagem para a Visa: $mensagem <br />";
    }
}
