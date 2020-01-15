<?php

namespace Pattern\Adapter;


use Pattern\Adapter\Funcionario;
use Pattern\Adapter\ControleDePonto;

class ControleDePontoAdapter extends ControleDePonto
{
    private $controleDePontoNovo;

    public function __construct()
    {
        $this->controleDePontoNovo = new ControleDePontoNovo();
    }

    public function registraEntrada(Funcionario $f)
    {
        $this->controleDePontoNovo->registra($f, true);
    }

    public function registraSaida(Funcionario $f)
    {
        $this->controleDePontoNovo->registra($f, false);
    }
}
