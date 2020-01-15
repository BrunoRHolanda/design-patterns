<?php

namespace Pattern\Bridge\Templates\Txt;


use Pattern\Bridge\Templates\Template;

class Recibo implements Template
{
    public function make(array $data): string
    {
        $str = "Recibo: ";
        $str .= "Empressa: {$data['emissor']}\n";
        $str .= "Cliente: {$data['favorecido']}\n";
        $str .= "Valor: {$data['valor']}\n";

        return $str;
    }
}
