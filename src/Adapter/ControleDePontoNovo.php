<?php

namespace Pattern\Adapter;


use DateTime;

use Pattern\Adapter\Funcionario;

class ControleDePontoNovo
{
    public function registra(Funcionario $f, bool $entrada)
    {
        $registro = new DateTime();

        if ($entrada) {
            echo "<pre>Entrada: {$f->getNome()} às {$registro->format("d/m/Y H:i:s")}\n</pre>";
        } else {
            echo "<pre>Saída: {$f->getNome()} às {$registro->format("d/m/Y H:i:s")}\n</pre>";
        }
    }
}
