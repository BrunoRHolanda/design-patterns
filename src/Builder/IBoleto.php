<?php

namespace Pattern\Builder;


use DateTime;

interface IBoleto 
{
    public function getSacado(): string;
    public function getCedente(): string;
    public function getValor(): float;
    public function getVencimento(): DateTime;
    public function getNossoNumero(): int;
    public function toString(): string;
}
