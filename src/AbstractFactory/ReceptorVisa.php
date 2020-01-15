<?php

namespace Pattern\AbstractFactory;


use Pattern\AbstractFactory\IReceptor;

class ReceptorVisa implements IReceptor
{
    public function recebe(): string
    {
        echo "Recebendo mensagem Visa. <br />";

        return "Mensagem da Visa";
    }
}
