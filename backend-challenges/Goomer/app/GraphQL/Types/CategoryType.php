<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Entities\Category;
use GraphQL\Type\Definition\Type;
use Illuminate\Pagination\LengthAwarePaginator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'description' => 'A type',
        'model' => Category::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'id da categoria',
                'alias' => 'category_id',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'nome da categoria'
            ],
        ];
    }

    protected function resolveIdField($root, $args)
    {
        return $root->getId();
    }

    protected function resolveDescriptionField($root, $args)
    {
        return $root->getDescription();
    }
}
