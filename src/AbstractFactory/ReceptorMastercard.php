<?php

namespace Pattern\AbstractFactory;


use Pattern\AbstractFactory\IReceptor;

class ReceptorMastercard implements IReceptor
{
    public function recebe(): string
    {
        echo "Recebendo mensagem Mastercard. <br />";

        return "Mensagem da Mastercard";
    }
}
