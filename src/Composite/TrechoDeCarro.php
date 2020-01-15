<?php

namespace Pattern\Composite;

use Pattern\Composite\Trecho;

class TrechoDeCarro implements Trecho
{
    private $distancia;

    private $direcao;

    public function __construct(string $direcao, float $distancia)
    {
        $this->direcao = $direcao;

        $this->distancia = $distancia;
    }

    public function imprime()
    {
        echo "<pre>";
        echo "Vá de carro: " . PHP_EOL;
        echo $this->direcao . PHP_EOL;
        echo "A distância percorrida será de: {$this->distancia} metros" . PHP_EOL;
        echo '</pre>';
    }
}