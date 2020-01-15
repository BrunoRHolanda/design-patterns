<?php

namespace Pattern\Decorator;

use Pattern\Decorator\EmissorDecorator;

class EmissorDecoratorComCompressao extends EmissorDecorator
{
    public function __construct(Emissor $emissor)
    {
        parent::__construct($emissor);
    }

    public function envia(string $mensagem)
    {
        echo "<pre>Enviando mensagem Comprimida...</pre>";
        $this->getEmissor()->envia($this->compress($mensagem));
    }

    private function compress($message)
    {
        return gzcompress($message, 9);
    }
}
