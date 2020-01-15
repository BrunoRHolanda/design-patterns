<?php

/**
 * Inicia as instâncias e dependências do app
 *
 */

require __DIR__ . '../../vendor/autoload.php';

use Challenge\OnlineOrders\Creators\ProductCreator;
use Challenge\OnlineOrders\Models\Address;
use Challenge\OnlineOrders\Models\CreditCard;
use Challenge\OnlineOrders\Models\Customer;
use Challenge\OnlineOrders\Models\Order;
use Challenge\OnlineOrders\Models\PaymentMethod;
use Challenge\OnlineOrders\Models\Product;
use Challenge\OnlineOrders\Models\ProductType;
use Challenge\OnlineOrders\Models\ShoppingCart;
use Challenge\OnlineOrders\Services\Payment;

echo "<html lang='pt-br' ><head><meta charset='UTF-8'><title>Online Orders</title></head><body>";

// Creating customer
$address_customer = new Address(
    "Campo Grande",
    "MS",
    "Brasil",
    "79020-190",
    "Cruzeiro",
    1650
);
$credit_card_customer = new CreditCard("123-456-789-456");

$customer = new Customer(
    "Bruno Holanda",
    "bruno@email.com",
    $address_customer,
    $credit_card_customer
);
$customer->save();

// Create product;
$book = ProductCreator::create(ProductType::PHYSICAL, Product::find(1));
$book->save();


$movie = ProductCreator::create(ProductType::SUBSCRIPTION, Product::find(2));
$movie->save();

$sound = ProductCreator::create(ProductType::DIGITAL_MEDIA, Product::find(3));
$sound->save();

$otherPhysical = ProductCreator::create(ProductType::PHYSICAL, Product::find(4));
$otherPhysical->save();

// Create Order
$billing_address = $customer->getAddress();
$shipping_address = $customer->getAddress();

$shopping_cart = new ShoppingCart();
$shopping_cart->add($book);
$shopping_cart->add($movie);
$shopping_cart->add($sound);
$shopping_cart->add($otherPhysical);

$order = new Order($customer, $billing_address, $shipping_address, $shopping_cart);

// process order and create transaction.
$payment_method = new PaymentMethod("credit-card");
$other_payment_method = new PaymentMethod("bank-slip");

$transaction_slip = Payment::pay($other_payment_method, $order);
$transaction = Payment::pay($payment_method, $order);

// process payment and create invoice.
$invoice_slip = Payment::process($transaction_slip);
$invoice_slip->printInvoice();

$invoice = Payment::process($transaction);
$invoice->printInvoice();

echo '</body>';
