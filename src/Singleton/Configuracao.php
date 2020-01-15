<?php

namespace Pattern\Singleton;


class Configuracao 
{
    private static $instance;

    private $propriedades;

    private function __construct()
    {
        $this->propriedades['time-zone'] = 'America/Sao_Paulo';

        $this->propriedades['corrency-code'] = 'BRL';
    }

    public static function getInstance(): Configuracao
    {
        if (Configuracao::$instance === null) {
            Configuracao::$instance = new static();
        }

        return Configuracao::$instance;
    }

    public function getPropriedade($key): string
    {
        if ($propriedade = $this->propriedades[$key]) {
            return $propriedade;
        } else {
            return '';
        }
    }
}
