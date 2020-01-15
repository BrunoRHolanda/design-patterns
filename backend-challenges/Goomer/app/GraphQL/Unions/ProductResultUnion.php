<?php

declare(strict_types=1);

namespace App\GraphQL\Unions;

use App\Entities\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\UnionType;

class ProductResultUnion extends UnionType
{
    protected $attributes = [
        'name' => 'ProductResultUnion',
        'description' => 'Resolve se vai retoronar paginado ou não',
    ];

    public function types(): array
    {
        return [
            GraphQL::paginate('Product'),
            GraphQL::type('Product'),
        ];
    }

    public function resolveType($root)
    {
        if ($root instanceof LengthAwarePaginator) {
            return GraphQL::paginate('Product');
        } else if ($root instanceof Product) {
            return GraphQL::type('Product');
        }
    }
}
