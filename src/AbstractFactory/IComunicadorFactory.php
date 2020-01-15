<?php

namespace Pattern\AbstractFactory;

use Pattern\AbstractFactory\IEmissor;
use Pattern\AbstractFactory\IReceptor;

interface IComunicadorFactory
{
    public function createEmissor(): IEmissor;

    public function createReceptor(): IReceptor;
}
