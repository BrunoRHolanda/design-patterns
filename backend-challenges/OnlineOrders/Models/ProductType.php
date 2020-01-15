<?php


namespace Challenge\OnlineOrders\Models;


class ProductType
{
    const SUBSCRIPTION = 'SUBSCRIPTION';
    const PHYSICAL = 'PHYSICAL';
    const DIGITAL_MEDIA = 'DIGITAL_MEDIA';

    /**
     * @var string
     */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function is(string $type)
    {
        return $this->getType() === $type;
    }
}
