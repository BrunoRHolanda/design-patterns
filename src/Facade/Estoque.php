<?php

namespace Pattern\Facade;


use DateTime;
use DateInterval;

class Estoque
{
    public function enviaProduto(string $produto, string $enderecoDeEntrega)
    {
        $hoje = new DateTime();
        $hoje->add(new DateInterval("P2D"));

        echo "<pre>";
        echo "O produto $produto será entregue no endereço $enderecoDeEntrega ";
        echo "até às 18 horas do dia {$hoje->format("d/m/Y")}";
        echo "</pre>";
    }
}
