<?php

namespace Pattern\Facade;

class Pedido
{
    private $produto;

    private $cliente;

    private $enderecoDeEntrega;

    public function __construct(string $produto, string $cliente, $enderecoDeEntrega)
    {
        $this->produto = $produto;

        $this->cliente = $cliente;

        $this->enderecoDeEntrega = $enderecoDeEntrega;
    }

    public function getProduto(): string
    {
        return $this->produto;
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public function getEnderecoDeEntrega(): string
    {
        return $this->enderecoDeEntrega;
    }
}
