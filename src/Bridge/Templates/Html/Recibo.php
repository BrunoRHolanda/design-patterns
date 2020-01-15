<?php

namespace Pattern\Bridge\Templates\Html;


use Pattern\Bridge\Templates\Template;

class Recibo implements Template
{
    public function make(array $data): string
    {
        $str = "<h1>Recibo: </h1>";
        $str .= "<p>Empressa: {$data['emissor']}</p>";
        $str .= "<p>Cliente: {$data['favorecido']}</p>";
        $str .= "<p>Valor: {$data['valor']}</p>";
        
        return $str;
    }
}
