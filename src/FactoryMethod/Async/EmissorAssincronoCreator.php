<?php

namespace Pattern\FactoryMethod\Async;

use Exception;

use Pattern\FactoryMethod\EmissorCreator;
use Pattern\FactoryMethod\IEmissor;

use Pattern\FactoryMethod\Async\EmissorSMS;
use Pattern\FactoryMethod\Async\EmissorEmail;
use Pattern\FactoryMethod\Async\EmissorJMS;

class EmissorAssincronoCreator extends EmissorCreator
{
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