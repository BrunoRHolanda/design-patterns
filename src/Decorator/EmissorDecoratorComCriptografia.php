<?php

namespace Pattern\Decorator;

use Pattern\Decorator\EmissorDecorator;

class EmissorDecoratorComCriptografia extends EmissorDecorator
{
    public function __construct(Emissor $emissor)
    {
        parent::__construct($emissor);
    }

    public function envia(string $mensagem)
    {
        echo "<pre>Enviando mensagem criptografada...</pre>";
        $this->getEmissor()->envia($this->cripty($mensagem));
    }

    private function cripty($plaintext)
    {
        $key = 'secret';
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        
        return base64_encode( $iv.$hmac.$ciphertext_raw );
    }
}
