<?php


namespace Challenge\OnlineOrders\Models;


abstract class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $value;

    /**
     * @var string
     */
    private $category;

    public function __construct(string $name, float $value, int $category_id)
    {
        $category = [
            1 => 'book',
            2 => 'Movies',
            3 => 'Sounds',
            4 => 'Copos',
        ];

        $this->name = $name;
        $this->value = $value;
        $this->category = $category[$category_id];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    public static function find(int $id): array
    {
        $products_table = [
            1 => [
                'name' => 'Fire Ball',
                'category' => 1,
                'value' => 50.75
            ],
            2 => [
                'name' => 'Detonator 3',
                'category' => 2,
                'value' => 80.54
            ],
            3 => [
                'name' => 'Nirvana',
                'category' => 3,
                'value' => 25.80
            ],
            4 => [
                'name' => 'Copo descartável',
                'category' => 4,
                'value' => 25.80
            ]
        ];

        return $products_table[$id];
    }

    abstract function purchase(Transaction $payment): bool;

    public function save()
    {
        // save product
        echo '<pre>';
        echo 'Saving Product....' . PHP_EOL;
        echo '--------------------------' . PHP_EOL;
        echo "Name: {$this->getName()}" . PHP_EOL;
        echo "Value: {$this->getValue()}" . PHP_EOL;
        echo "Category: {$this->getCategory()}" . PHP_EOL;
        echo '--------------------------' . PHP_EOL;
    }
}
