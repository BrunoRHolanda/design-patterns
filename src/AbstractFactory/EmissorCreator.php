<?php

namespace Pattern\AbstractFactory;


use Pattern\AbstractFactory\IEmissor;
use Pattern\AbstractFactory\EmissorVisa;
use Pattern\AbstractFactory\EmissorMastercard;

class EmissorCreator 
{
    const VISA = 0;
    const MASTERCARD = 1;

    public function create(int $tipoDoEmissor): IEmissor
    {
        switch ($tipoDoEmissor) {
            case EmissorCreator::VISA:
                return new EmissorVisa();
                break;
            case EmissorCreator::MASTERCARD:
                return new EmissorMastercard();
                break;
            default:
                throw new Exception("Tipo de emissor não suportado. <br />");
                break;
        }
    }
}