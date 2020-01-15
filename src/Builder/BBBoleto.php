<?php

namespace Pattern\Builder;

use DateTime;

use Pattern\Builder\IBoleto;

class BBBoleto implements IBoleto
{
    private $sacado;

    private $cedente;

    private $valor;

    private $vencimento;

    private $nossoNumero;

    public function __construct(string $sacado, string $cedente, float $valor, DateTime $vencimento, int $nossoNumero)
    {
        $this->sacado = $sacado;
        $this->cedente = $cedente;
        $this->valor = $valor;
        $this->vencimento = $vencimento;
        $this->nossoNumero  =$nossoNumero;
    }

    public function getSacado(): string
    {
        return $this->sacado;
    }

    public function getCedente(): string
    {
        return $this->cedente;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getVencimento(): DateTime
    {
        return $this->vencimento;
    }

    public function getNossoNumero(): int
    {
        return $this->nossoNumero;
    }

    public function toString(): string
    {
        $str = "<pre>";
        $str .= "Boleto BB\n";
        $str .= "Sacado: {$this->sacado}\n";
        $str .= "Cedente: {$this->cedente}\n";
        $str .= "Valor: {$this->valor}\n";
        $str .= "Vencimento: {$this->vencimento->format("d/m/Y h:i:s")}\n";
        $str .= "Nosso Número: {$this->nossoNumero}\n";
        $str .= "</pre>";

        return $str;
    }
}