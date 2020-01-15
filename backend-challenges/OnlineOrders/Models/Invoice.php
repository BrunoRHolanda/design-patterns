<?php


namespace Challenge\OnlineOrders\Models;


class Invoice
{
    private $client;

    private $billing_address;

    private $amount;

    private $items;

    private $authorization_code;

    private $transaction_status;

    public function __construct(Transaction $transaction)
    {
        $this->client = $transaction->getPayment()->getCustomer();
        $this->billing_address = $transaction->getPayment()->getBillingAddress();
        $this->amount = $transaction->getPayment()->getAmount();
        $this->items = $transaction->getPayment()->getItems();
        $this->authorization_code = $transaction->getTransactionHash();
        $this->transaction_status = $transaction->getStatus();
    }

    public function printInvoice()
    {
        echo '<pre>';
        echo "Client: {$this->client->getName()}" . PHP_EOL;
        echo "Transaction status: {$this->transaction_status}" . PHP_EOL;
        echo "Authorization Code: {$this->authorization_code}" . PHP_EOL;
        echo "Items" . PHP_EOL;
        echo "Name - Value" . PHP_EOL;
        foreach ($this->items as $product) {
            echo $product->getName() . ' - ' . $product->getValue() . PHP_EOL;
        }
        echo "Total: {$this->amount}" . PHP_EOL;
        echo '</pre>';
    }
}
