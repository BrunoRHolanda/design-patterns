<?php


namespace Challenge\OnlineOrders\Models;


class Address
{
    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $zip_code;

    /**
     * @var string
     */
    private $street;

    /**
     * @var int
     */
    private $number;

    public function __construct(
        string $city,
        string $state,
        string $country,
        string $zip_code,
        string $street,
        string $number
    ) {
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->zip_code = $zip_code;
        $this->street = $street;
        $this->number = $number;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getZipCode(): string
    {
        return $this->zip_code;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
