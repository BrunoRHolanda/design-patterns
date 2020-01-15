<?php
/**
 * Inicia as instâncias e dependências do app
 *
 */
require '../../vendor/autoload.php';

use Pattern\Composite\TrechoAndando;
use Pattern\Composite\TrechoDeCarro;
use Pattern\Composite\Caminho;

$trecho1 = new TrechoAndando(
    " Vá até o cruzamento da Av . Rebouças com a Av . Brigadeiro Faria Lima ",
    500);

$trecho2 = new TrechoDeCarro(
    "Vá até o cruzamento da Av . Brigadeiro Faria Lima com a Av . Cidade Jardim " ,
    1500);

$trecho3 = new TrechoDeCarro(
    " Vire a direita na Marginal Pinheiros " , 500) ;

$caminho1 = new Caminho();
$caminho1->adiciona($trecho1);
$caminho1->adiciona($trecho2);

echo "<pre>Caminho 1:</pre>";
$caminho1->imprime();

$caminho2 = new Caminho();
$caminho2->adiciona($trecho3);
$caminho2->adiciona($caminho1);

echo "<br />";
echo "=============================<br />";
echo "<pre>Caminho 2:</pre>";
$caminho2->imprime();
