<?php


namespace Challenge\OnlineOrders\Models;


class DigitalMediaProduct extends Product
{
    private $productType;

    public function __construct(string $name, float $value, int $category)
    {
        parent::__construct($name, $value, $category);

        $this->productType = new ProductType(ProductType::DIGITAL_MEDIA);
    }

    /**
     * @return ProductType
     */
    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    function purchase(Transaction $transaction): bool
    {
        echo '<pre>';
        echo 'Compra Produto Digital' . PHP_EOL;
        echo "Enviando para email: {$transaction->getPayment()->getCustomer()->getEmail()}" . PHP_EOL;
        echo "Número da Transação: {$transaction->getTransactionNumber()}" . PHP_EOL;
        echo '</pre>';

        return true;
    }
}
