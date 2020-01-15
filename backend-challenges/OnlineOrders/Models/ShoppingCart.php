<?php


namespace Challenge\OnlineOrders\Models;


class ShoppingCart
{
    private $items;

    private $length;

    private $index;

    public function __construct($items = [])
    {
        $this->items = $items;
        $this->index = 0;
        $this->length = 0;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return Product|null
     */
    public function nextItem()
    {
        if ($this->index < $this->length) {
            return $this->items[$this->index++];
        } else {
            $this->index = 0;
            return null;
        }
    }

    public function add(Product $product)
    {
        $this->items[] = $product;
        $this->length = count($this->items);
    }

    /**
     * @return Product[]
     *
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
