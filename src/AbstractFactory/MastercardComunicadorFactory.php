<?php

namespace Pattern\AbstractFactory;

use Pattern\AbstractFactory\IComunicadorFactory;

class MastercardComunicadorFactory implements IComunicadorFactory
{
    /**
     * Factory Methods
     * 
     */
    private $emissorCreator;

    private $receptorCreator;

    public function __construct()
    {
        $this->emissorCreator = new EmissorCreator();

        $this->receptorCreator = new ReceptorCreator();
    }

    public function createEmissor(): IEmissor
    {
        return $this->emissorCreator->create(EmissorCreator::MASTERCARD);
    }

    public function createReceptor(): IReceptor
    {
        return $this->receptorCreator->create(ReceptorCreator::MASTERCARD);
    }
}
