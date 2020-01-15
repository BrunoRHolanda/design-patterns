<?php

namespace Pattern\Adapter;


use DateTime;

use Pattern\Adapter\Funcionario;

class ControleDePonto
{
    public function registraEntrada(Funcionario $f)
    {
        $entrada = new DateTime();

        echo "<pre>Entrada: {$f->getNome()} às {$entraada->format("d/m/Y H:i:s")}\n</pre>";
    }

    public function registraSaida(Funcionario $f)
    {
        $saida = new DateTime();

        echo "<pre>Saída: {$f->getNome()} às {$saida->format("d/m/Y H:i:s")}\n</pre>";
    }
}
