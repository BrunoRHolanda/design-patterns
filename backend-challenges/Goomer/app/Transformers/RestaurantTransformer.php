<?php

namespace App\Transformers;

use App\Entities\Restaurant;
use Flugg\Responder\Transformers\Transformer;

class RestaurantTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'products' => ProductTransformer::class,
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [
        'operation' => OperationTransformer::class,
    ];

    /**
     * Transform the model.
     *
     * @param Restaurant $restaurant
     * @return array
     */
    public function transform(Restaurant $restaurant)
    {
        return [
            'id' => $restaurant->getId(),
            'name' => $restaurant->getName(),
            'address' => $restaurant->getAddress(),
            'operation' => $restaurant->getOperation(),
            'products' => $restaurant->getProducts(),
        ];
    }
}
