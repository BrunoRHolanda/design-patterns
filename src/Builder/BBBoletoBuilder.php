<?php

namespace Pattern\Builder;

use DateTime;

use Pattern\Builder\IBoletoBuilder;

class BBBoletoBuilder implements IBoletoBuilder 
{
    private $sacado;

    private $cedente;

    private $valor;

    private $vencimento;

    private $nossoNumero;

    public function buildSacado(string $sacado)
    {
        $this->sacado = $sacado;
    }

    public function buildCedente(string $cedente)
    {
        $this->cedente = $cedente;
    }

    public function buildValor(float $valor)
    {
        $this->valor = $valor;
    }

    public function buildVencimento(DateTime $vencimento)
    {
        $this->vencimento = $vencimento;
    }

    public function buildNossoNumero(int $nossoNumero)
    {
        $this->nossoNumero = $nossoNumero;
    }

    public function getBoleto(): IBoleto
    {
        return new BBBoleto($this->sacado, $this->cedente, $this->valor, $this->vencimento, $this->nossoNumero);
    }
}
