<?php


namespace Challenge\OnlineOrders\Models;


class Shipping
{
    private $address;

    private $cost;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @param array|Product[] $items
     * @return float
     */
    public function calc(array $items): float
    {
        $this->cost = 200;

        return $this->cost;
    }
}
