<?php
/**
 * Inicia as instâncias e dependências do app
 *
 */
require '../../vendor/autoload.php';

use Pattern\Adapter\ControleDePontoAdapter;
use Pattern\Adapter\Funcionario;

$controleDePonto = new ControleDePontoAdapter();
$funcionario = new Funcionario("Bruno");

$controleDePonto->registraEntrada($funcionario);
$controleDePonto->registraSaida($funcionario);
