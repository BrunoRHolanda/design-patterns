<?php

namespace Pattern\FactoryMethod;

use Exception;

use Pattern\FactoryMethod\IEmissor;

use Pattern\FactoryMethod\EmissorSMS;
use Pattern\FactoryMethod\EmissorEmail;
use Pattern\FactoryMethod\EmissorJMS;

class EmissorCreator
{
    const SMS = 0;
    const EMAIL = 1;
    const JMS = 2;

    public function create($tipoEmissor): IEmissor
    {
        switch ($tipoEmissor) {
            case EmissorCreator::SMS:
                return new EmissorSMS();
                break;
            case EmissorCreator::EMAIL:
                return new EmissorEmail();
                break;
            case EmissorCreator::JMS:
                return new EmissorJMS();
                break;
            default:
                throw new Exception("Tipo de Emissor inválido!");
                break;
        }
    }
}
