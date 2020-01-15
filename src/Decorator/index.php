<?php
/**
 * Inicia as instâncias e dependências do app
 *
 */
require '../../vendor/autoload.php';

use Pattern\Decorator\EmissorBasico;
use Pattern\Decorator\EmissorDecoratorComCriptografia;
use Pattern\Decorator\EmissorDecoratorComCompressao;

$mensagem  = 'Olá';

$emissorCriptografado = new EmissorDecoratorComCriptografia(new EmissorBasico());
$emissorCriptografado->envia($mensagem);

$emissorCompressor = new EmissorDecoratorComCompressao(new EmissorBasico());
$emissorCompressor->envia($mensagem);

$emissorCriptyCompress = new EmissorDecoratorComCriptografia(
    new EmissorDecoratorComCompressao(new EmissorBasico()));
$emissorCriptyCompress->envia($mensagem);
