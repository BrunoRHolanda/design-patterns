<?php

namespace Pattern\Decorator;


use Pattern\Decorator\Emissor;

class EmissorBasico implements Emissor
{
    public function envia(string $mensagem)
    {
        echo '<pre>';
        echo "enviando uma mensagem: $mensagem";
        echo "</pre>";
    }
}