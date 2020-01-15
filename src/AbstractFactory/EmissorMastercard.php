<?php

namespace Pattern\AbstractFactory;


use Pattern\AbstractFactory\IEmissor;

class EmissorMastercard implements IEmissor
{
    public function envia(string $mensagem)
    {
        echo "Enviando a seguinte mensagem para a Mastercard: $mensagem <br />";
    }
}
