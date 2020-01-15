<?php

namespace Pattern\AbstractFactory;

use Pattern\AbstractFactory\IComunicadorFactory;

class VisaComunicadorFactory implements IComunicadorFactory
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
        return $this->emissorCreator->create(EmissorCreator::VISA);
    }

    public function createReceptor(): IReceptor
    {
        return $this->receptorCreator->create(ReceptorCreator::VISA);
    }
}
