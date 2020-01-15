<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Entities\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'A type',
        'model' => Product::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'id do produto',
                'alias' => 'product_id'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'nome do produto',
            ],
            'price' => [
                'type' => Type::float(),
                'description' => 'preço do produto',
            ],
            'photo' => [
                'type' => Type::string(),
                'description' => 'url da foto do produto',
            ],
            'category' => [
                'type' => GraphQL::type('Category'),
                'description' => 'categoria do produto',
            ],
            'promotion' => [
                'type' => Type::listOf(GraphQL::type('Promotion')),
                'description' => 'Promoções do produto',
            ],
        ];
    }

    /**
     * @param Product $product
     * @return mixed
     */
    protected function resolveIdField($product)
    {
        return $product->getId();
    }

    /**
     * @param Product $product
     * @return mixed
     */
    protected function resolveNameField($product)
    {
        return $product->getName();
    }

    /**
     * @param Product $product
     * @return float
     */
    protected function resolvePriceField($product)
    {
        return $product->getPrice();
    }

    /**
     * @param Product $product
     * @return mixed
     */
    protected function resolvePhotoField($product)
    {
        return $product->getPhotoUrl();
    }

    /**
     * @param Product $product
     * @return mixed
     */
    protected function resolveCategoryField($product)
    {
        return $product->getCategory();
    }
}
