<?php

namespace Pattern\Facade;


class Financeiro
{
    public function fatura(string $cliente, string $produto)
    {
        echo "<pre>";
        echo "Fatura:" . PHP_EOL;
        echo "Cliente: $cliente" . PHP_EOL;
        echo "Produto: $produto" . PHP_EOL;
        echo "</pre>";
    }
}
