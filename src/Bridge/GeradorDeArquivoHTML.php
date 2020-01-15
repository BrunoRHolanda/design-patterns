<?php

namespace Pattern\Bridge;


use Pattern\Bridge\GeradorDeArquivo;

class GeradorDeArquivoHTML implements GeradorDeArquivo
{
    public function gera(array $conteudo, string $templateClass)
    {   
        $templatePath = "\\Pattern\\Bridge\\Templates\\Html\\$templateClass";
        $recibo = fopen(__DIR__ . '/storage/recibo.html', 'w');
        
        $conteudoProcessado = (new $templatePath())->make($conteudo);

        fwrite($recibo, $conteudoProcessado);
        fclose($recibo);
    }
}