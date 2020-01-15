<?php

namespace Pattern\Builder;


use DateTime;

use Pattern\Builder\IBoleto;

interface IBoletoBuilder 
{
    public function buildSacado(string $sacado);
    public function buildCedente(string $cedente);
    public function buildValor(float $valor);
    public function buildVencimento(DateTime $vencimento);
    public function buildNossoNumero(int $nossoNumero);

    public function getBoleto(): IBoleto;
}
