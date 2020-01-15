<?php

namespace Challenge\OnlineOrders;

use DateTime;

class Payment
{
    public $authorization_number;
    public $amount;
    public $invoice;
    public $order;
    public $payment_method;
    public $paid_at;

    public function __construct($attributes = [])
    {
        $this->authorization_number = $attributes['attributes'] ?? null;
        $this->amount = $attributes['amount'] ?? null;
        $this->invoice = $attributes['invoice'] ?? null;
        $this->order = $attributes['order'] ?? null;
        $this->payment_method = $attributes['payment_method'] ?? null;
    }

    public function pay($paid_at = null)
    {
        if ($paid_at = null)
            $paid_at = new DateTime();

        $this->amount = $this->order->total_amount;
        $this->authorization_number = (new DateTime())->getTimestamp();
        $attributes = [
            'billing_address' => $this->order->address,
            'shipping_address' => $this->order->address,
            'order' => $this->order,
        ];
        $this->invoice = new Invoice($attributes);
        $this->paid_at = $paid_at;
        $this->order->close($paid_at);
    }

    public function is_paid()
    {
        return $this->paid_at != null;
    }
}

class Invoice
{
    public $billing_address;
    public $shipping_address;
    public $order;

    public function __construct($attributes = [])
    {
        $this->billing_address = $attributes['billing_address'] ?? null;
        $this->shipping_address = $attributes['shipping_address'] ?? null;
        $this->order = $attributes['order'] ?? null;
    }
}

class Order
{
    public $customer;
    public $items;
    public $payment;
    public $address;
    public $closed_at;
    public $order_item_class;

    public function __construct($attributes = [])
    {
        $this->customer = $attributes['customer'];
        $this->items = [];
        $this->order_item_class = ['order_item_class'] ?? OrderItem::class;
        $this->address = ['address'] ?? (new Address('45678-979'));
    }

    public function add_product(Product $product)
    {
        array_push($this->items, new OrderItem($this, $product));
    }

    public function total_amount()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->total();
        }

        return $total;
    }

    public function close()
    {
        $this->closed_at = new DateTime();
    }
}

class OrderItem
{
    public $order;

    public $product;

    public function __construct($order, $product)
    {
        $this->order = $order;
        $this->product = $product;
    }

    public function total()
    {
        return 10;
    }
}

class Product
{
    public $name;

    public $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }
}

class Address
{
    public $zipcode;

    public function __construct($zipcode)
    {
        $this->zipcode = $zipcode;
    }
}

class CreditCard
{
    static function fetch_by_hashed($code)
    {
        return new CreditCard();
    }
}

class Customer
{
    //
}

class Membership
{

}
