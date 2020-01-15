<?php
/**
 * Inicia as instâncias e dependências do app
 *
 */
require '../../vendor/autoload.php';

use Pattern\Bridge\GeradorDeArquivoHTML;
use Pattern\Bridge\GeradorDeArquivoTXT;
use Pattern\Bridge\Recibo;

(new Recibo(
    "Before", 
    "João da Silva", 
    256, 
    new GeradorDeArquivoTXT()
))->gerarDocumento();

(new Recibo(
    "Before", 
    "João da Silva", 
    256, 
    new GeradorDeArquivoHTML())
)->gerarDocumento();
