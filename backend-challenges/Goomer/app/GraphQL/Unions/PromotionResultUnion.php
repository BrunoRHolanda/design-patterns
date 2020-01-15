<?php

declare(strict_types=1);

namespace App\GraphQL\Unions;


use App\Entities\Promotion;
use Illuminate\Pagination\LengthAwarePaginator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\UnionType;

class PromotionResultUnion extends UnionType
{
    protected $attributes = [
        'name' => 'PromotionResultUnion',
        'description' => 'União para lidar com o tipo de listagem das promoções',
    ];

    public function types(): array
    {
        return [
            GraphQL::type('Promotion'),
            GraphQL::paginate('Promotion'),
        ];
    }

    public function resolveType($root)
    {
        if ($root instanceof LengthAwarePaginator) {
            return GraphQL::paginate('Promotion');
        } else if ($root instanceof Promotion) {
            return GraphQL::type('Promotion');
        }
    }
}
