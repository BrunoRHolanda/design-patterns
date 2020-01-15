<?php


namespace Challenge\OnlineOrders\Creators;


use Exception;

use Challenge\OnlineOrders\Models\DigitalMediaProduct;
use Challenge\OnlineOrders\Models\PhysicalProduct;
use Challenge\OnlineOrders\Models\Product;
use Challenge\OnlineOrders\Models\ProductType;
use Challenge\OnlineOrders\Models\SubscriptionProduct;

class ProductCreator
{
    /**
     * @param string $product_type
     * @param array $data - [name:string, value:float, category:int]
     * @return Product
     * @throws Exception
     */
    public static function create(string $product_type, array $data): Product
    {
        switch ($product_type) {
            case ProductType::PHYSICAL:
                return new PhysicalProduct($data['name'], $data['value'], $data['category']);
                break;
            case ProductType::SUBSCRIPTION:
                return new SubscriptionProduct($data['name'], $data['value'], $data['category']);
                break;
            case ProductType::DIGITAL_MEDIA:
                return new DigitalMediaProduct($data['name'], $data['value'], $data['category']);
                break;
            default:
                throw new Exception("Product Type Not Found");
        }
    }
}
