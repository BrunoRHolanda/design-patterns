<?php

namespace Pattern\Builder;


use DateTime;

use Pattern\Builder\IBoleto;
use Pattern\Builder\IBoletoBuilder;

class GeradorDeBoleto 
{
    private $boletoBuilder;

    public function __construct(IBoletoBuilder $boletoBuilder)
    {
        $this->boletoBuilder = $boletoBuilder;
    }

    public function gerarBoleto(): IBoleto
    {
        $this->boletoBuilder->buildSacado("Bruno R. Holanda");
        $this->boletoBuilder->buildCedente("Alura");
        $this->boletoBuilder->buildValor(200.15);
        $this->boletoBuilder->buildVencimento(new DateTime());
        $this->boletoBuilder->buildNossoNumero(12345);

        return $this->boletoBuilder->getBoleto();
    }
}
