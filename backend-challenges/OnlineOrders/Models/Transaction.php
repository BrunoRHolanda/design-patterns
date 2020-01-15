<?php


namespace Challenge\OnlineOrders\Models;


use DateTime;
use Exception;

class Transaction
{
    /**
     * @var Payment
     */
    private $payment;

    /**
     * @var array|Product[]
     */
    private $items;

    /**
     * @var string
     */
    private $transaction_number;

    /**
     * @var string
     */
    private $transaction_hash;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Shipping
     */
    private $shipping;

    /**
     * Transaction constructor.
     * @param Payment $payment
     *
     * @param Shipping $shipping
     * @throws Exception
     */
    public function __construct(Payment $payment, Shipping $shipping)
    {
        $this->payment = $payment;
        $this->items = $payment->getItems();
        $this->transaction_number = (new DateTime())->getTimestamp();
        $this->transaction_hash = base64_encode($payment->getAuthorizationNumber());
        $this->shipping = $shipping;

        if ($payment->isPaid()) {
            $this->status = 'finished';
        } else {
            $this->status = 'processing';
        }
    }

    /**
     * @return array|Product[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @return string
     */
    public function getTransactionHash(): string
    {
        return $this->transaction_hash;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getTransactionNumber(): string
    {
        return $this->transaction_number;
    }

    /**
     * @param string $transaction_number
     */
    public function setTransactionNumber(string $transaction_number)
    {
        $this->transaction_number = $transaction_number;
    }

    /**
     * @param string $transaction_hash
     */
    public function setTransactionHash(string $transaction_hash)
    {
        $this->transaction_hash = base64_encode($transaction_hash);
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}
