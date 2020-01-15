<?php


namespace Challenge\OnlineOrders\Models;


/**
 * Class Customer
 * @package Challenge\OnlineOrders\Entities
 */
class Customer
{
    /**
     * @var static
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var CreditCard
     */
    private $credit_card;

    public function __construct(
        string $name,
        string $email,
        Address $address,
        CreditCard $credit_card
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->credit_card  = $credit_card;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getCreditCard(): CreditCard
    {
        return $this->credit_card;
    }

    public function save() {
        echo '<pre>';
        echo 'saved customer....' . PHP_EOL;
        echo '------------------------' . PHP_EOL;
        echo "Name: {$this->getName()}" . PHP_EOL;
        echo "email: {$this->getEmail()}" . PHP_EOL;
        echo "------------------------" . PHP_EOL;
        echo '</pre>';
    }
}
