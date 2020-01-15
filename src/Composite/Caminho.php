<?php

namespace Pattern\Composite;


use Pattern\Composite\Trecho;

class Caminho implements Trecho 
{
    private $trechos;

    public function adiciona(Trecho $trecho)
    {
        $this->trechos[spl_object_hash($trecho)] = $trecho;
    }

    public function remove(Trecho $trecho)
    {
        unset($this->trechos[spl_object_hash($trecho)]);
    }

    public function imprime()
    {
        foreach ($this->trechos as $hash => $trecho) {
            $trecho->imprime();
        }
    }
}
