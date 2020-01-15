<?php


namespace Challenge\OnlineOrders\Models;


use DateTime;

use Challenge\OnlineOrders\Models\DbTables\CustomerTable;

class Payment
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var DateTime
     */
    private $paid_at;

    /**
     * @var string
     *
     */
    private $authorization_number;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var PaymentMethod
     *
     */
    private $payment_method;

    /**
     * @var Product[]
     */
    private $items;

    /**
     * @var Address
     */
    private $billingAddress;

    public function __construct(
        Customer $customer,
        ShoppingCart $cart,
        PaymentMethod $payment_method,
        Address $billingAddress,
        string $paid_at = null
    ) {
        $this->amount = Payment::calcAmount($cart);
        $this->paid_at = $paid_at;
        $this->customer = $customer;
        $this->payment_method = $payment_method;
        $this->items = $cart->getItems();
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return DateTime
     */
    public function getPaidAt()
    {
        return $this->paid_at;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return string
     */
    public function getAuthorizationNumber()
    {
        return $this->authorization_number;
    }

    /**
     * @return PaymentMethod
     */
    public function getPaymentMethod(): PaymentMethod
    {
        return $this->payment_method;
    }

    /**
     * @return Address
     */
    public function getBillingAddress(): Address
    {
        return $this->billingAddress;
    }

    /**
     * @return Product[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param DateTime $paid_at
     */
    public function setPaidAt(DateTime $paid_at)
    {
        $this->paid_at = $paid_at;
    }

    /**
     * @param string $authorization_number
     */
    public function setAuthorizationNumber(string $authorization_number)
    {
        $this->authorization_number = $authorization_number;
    }
    public function isPaid(): bool
    {
        return $this->getPaidAt() !== null;
    }

    public static function calcAmount(ShoppingCart $shoppingCart)
    {
        $total = 0;

        while($product = $shoppingCart->nextItem()) {
            $total += $product->getValue();
        }
        return $total;
    }
}
