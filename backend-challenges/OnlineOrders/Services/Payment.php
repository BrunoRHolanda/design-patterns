<?php


namespace Challenge\OnlineOrders\Services;


use DateTime;
use Exception;

use Challenge\OnlineOrders\Models;

class Payment
{
    /**
     * @param Models\PaymentMethod $paymentMethod
     * @param Models\Order $order
     * @return Models\Transaction
     * @throws Exception
     */
    public static function pay(Models\PaymentMethod $paymentMethod, Models\Order $order): Models\Transaction
    {
        $cart = $order->getShoppingCart();
        $owner = $order->getOwner();
        $billingAddress = $order->getBillingAddress();

        $payment = new Models\Payment(
            $owner,
            $cart,
            $paymentMethod,
            $billingAddress
        );

        $shipping = new Models\Shipping($order->getShippingAddress());

        return new Models\Transaction($payment, $shipping);
    }

    public static function process(Models\Transaction $transaction): Models\Invoice
    {
        // process payment (melhorar)

        foreach ($transaction->getPayment()->getItems() as $product) {
            $product->purchase($transaction);
        }

        if ($transaction->getPayment()->getPaymentMethod()->getName() === 'credit-card') {
            $creditCardNumber = $transaction->getPayment()->getCustomer()->getCreditCard()->getNumber();
            $hash = Models\CreditCard::fetch_by_hashed($creditCardNumber);
            $customer = $transaction->getPayment()->getCustomer();
            $transaction->getPayment()->setPaidAt(new DateTime());
            $transaction->getPayment()->setAuthorizationNumber((new DateTime())->getTimestamp());
            $transaction->setTransactionHash($transaction->getPayment()->getAuthorizationNumber());
            $transaction->setTransactionNumber((new DateTime())->getTimestamp());
            $transaction->setStatus('finished');
        }

        return new Models\Invoice($transaction);
    }
}
