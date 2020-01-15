<?php


namespace Challenge\OnlineOrders\Models;

class CreditCard
{
    /**
     * @var string
     *
     */
    private $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public static function fetch_by_hashed(string $number)
    {
        return base64_encode($number);
    }
}
