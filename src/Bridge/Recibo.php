<?php

namespace Pattern\Bridge;


use Pattern\Bridge\Documento;

class Recibo implements Documento
{   
    private $emissor;

    private $favorecido;

    private $valor;

    private $geradorDeArquivo;

    public function __construct(
        string $emissor, 
        string $favorecido, 
        float $valor,
        GeradorDeArquivo $geradorDeArquivo
    )
    {
        $this->emissor = $emissor;

        $this->favorecido = $favorecido;

        $this->valor = $valor;

        $this->geradorDeArquivo = $geradorDeArquivo;
    }

    public function gerarDocumento()
    {
        $conteudo = [
            'emissor' => $this->emissor,
            'favorecido' => $this->favorecido,
            'valor' => $this->valor,
        ];

        $this->geradorDeArquivo->gera($conteudo, 'Recibo');
    }
}
