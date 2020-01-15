<?php


namespace Challenge\OnlineOrders\Models;


use Challenge\OnlineOrders\Models\DbTables\CustomerTable;
use DateTime;

class Order
{
    /**
     * @var DateTime
     */
    private $closed_at;

    /**
     * @var Address
     */
    private $billing_address;

    /**
     * @var Address
     */
    private $shipping_address;

    /**
     * @var Customer
     *
     */
    private $owner;

    /**
     * @var ShoppingCart
     */
    private $shopping_cart;

    public function __construct(
        Customer $owner,
        Address $billing_address,
        Address $shipping_address,
        ShoppingCart $shopping_cart
    ) {
        $this->owner = $owner;
        $this->billing_address = $billing_address;
        $this->shipping_address = $shipping_address;
        $this->shopping_cart = $shopping_cart;
    }

    public function close()
    {
        $this->setClosedAt(new DateTime());
    }

    public function isClosed()
    {
        return $this->getClosedAt() !== null;
    }

    /**
     * @return ShoppingCart
     */
    public function getShoppingCart(): ShoppingCart
    {
        return $this->shopping_cart;
    }


    /**
     * @return Address
     */
    public function getBillingAddress(): Address
    {
        return $this->billing_address;
    }

    /**
     * @return Datetime
     */
    public function getClosedAt(): Datetime
    {
        return $this->closed_at;
    }

    /**
     * @return Address
     */
    public function getShippingAddress(): Address
    {
        return $this->shipping_address;
    }

    /**
     * @return Customer
     */
    public function getOwner(): Customer
    {
        return $this->owner;
    }

    /**
     * @param Datetime $closed_at
     */
    public function setClosedAt(Datetime $closed_at)
    {
        $this->closed_at = $closed_at;
    }

    public function save()
    {
        // save it...
    }
}
