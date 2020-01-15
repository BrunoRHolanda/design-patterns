<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Entities\Promotion;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PromotionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Promotion',
        'description' => 'Tipo promoções',
        'model' => Promotion::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'id da promoção',
                'alias' => 'promotion_id'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'descrição da promoção',
            ],
            'promotional_price' => [
                'type' => Type::float(),
                'description' => 'valor promocional do produto',
            ],
            'validity' => [
                'type' => Type::listOf(GraphQL::type('validity')),
                'description' => 'validades da promoção.',
            ],
        ];
    }
}
