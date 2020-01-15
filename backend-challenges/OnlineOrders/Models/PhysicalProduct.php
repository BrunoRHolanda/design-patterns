<?php


namespace Challenge\OnlineOrders\Models;


class PhysicalProduct extends Product
{
    private $productType;

    public function __construct(string $name, float $value, int $category)
    {
        parent::__construct($name, $value, $category);

        $this->productType = new ProductType(ProductType::PHYSICAL);
    }

    /**
     * @return ProductType
     */
    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    public function generateShippingLabel()
    {
        echo 'Gerando Shipping label' . PHP_EOL;
    }

    function purchase(Transaction $transaction): bool
    {
        echo '<pre>';
        echo 'Compra Produto Físico' . PHP_EOL;

        $this->generateShippingLabel();

        echo "Número da Transação: {$transaction->getTransactionNumber()}" . PHP_EOL;
        echo "Inserindo na caixa de envio..." . PHP_EOL;

        if ($this->getCategory() === 'book') {
            echo "Insentando de impostos..." . PHP_EOL;
        }

        echo '</pre>';

        return true;
    }
}
