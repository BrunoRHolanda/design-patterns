<?php

namespace Pattern\Bridge;


interface GeradorDeArquivo
{
    public function gera(array $conteudo, string $templateClass);
}
