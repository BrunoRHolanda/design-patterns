<?php

namespace Pattern\Facade;


use DateTime;
use DateInterval;

class PosVenda
{
    public function agendaContato(string $cliente, string $produto)
    {
        $hoje = new DateTime();
        $hoje->add(new DateInterval("P30D"));

        echo "<pre>";
        echo "Entrar em contato com $cliente sobre o produto $produto";
        echo " no dia {$hoje->format("d/m/Y")}";
        echo "</pre>";
    }
}