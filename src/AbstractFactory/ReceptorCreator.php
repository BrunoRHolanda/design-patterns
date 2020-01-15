<?php

namespace Pattern\AbstractFactory;


use Pattern\AbstractFactory\IReceptor;
use Pattern\AbstractFactory\ReceptorVisa;
use Pattern\AbstractFactory\ReceptorMastercard;

class ReceptorCreator 
{
    const VISA = 0;
    const MASTERCARD = 1;

    public function create(int $tipoDoReceptor): IReceptor
    {
        switch (tipoDoReceptor) {
            case ReceptorCreator::VISA:
                return new ReceptorVisa();
                break;
            case ReceptorCreator::MASTERCARD:
                return new ReceptorMastercard();
                break;
            default:
                throw new Exception("Tipo de receptor não suportado. <br />");
                break;
        }
    }
}