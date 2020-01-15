<?php

namespace Pattern\Bridge;


use Pattern\Bridge\GeradorDeArquivo;

class GeradorDeArquivoTXT implements GeradorDeArquivo
{

    public function gera(array $conteudo, string $templateClass)
    {   
        $templatePath = "\\Pattern\\Bridge\\Templates\\Txt\\$templateClass";
        $recibo = fopen(__DIR__ . '/storage/recibo.txt', 'w');
        
        $conteudoProcessado = (new $templatePath())->make($conteudo);

        fwrite($recibo, $conteudoProcessado);
        fclose($recibo);
    }
}