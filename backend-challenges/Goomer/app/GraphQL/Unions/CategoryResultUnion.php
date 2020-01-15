<?php

declare(strict_types=1);

namespace App\GraphQL\Unions;

use App\Entities\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\UnionType;

class CategoryResultUnion extends UnionType
{
    protected $attributes = [
        'name' => 'CategoryResultUnion',
        'description' => 'Resolve se vai retoronar paginado ou não',
    ];

    public function types(): array
    {
        return [
            GraphQL::paginate('Category'),
            GraphQL::type('Category'),
        ];
    }

    public function resolveType($root)
    {
        if ($root instanceof LengthAwarePaginator) {
            return GraphQL::paginate('Category');
        } else if ($root instanceof Category) {
            return GraphQL::type('Category');
        }
    }
}
