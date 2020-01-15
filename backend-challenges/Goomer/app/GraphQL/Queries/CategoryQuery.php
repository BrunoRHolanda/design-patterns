<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Services\CategoryService;
use App\Transformers\CategoryTransformer;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'CategoryQuery',
        'description' => 'Query para lidar com o filtro de categorias'
    ];

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function type(): Type
    {
        return GraphQL::type('CategoryUnion');
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'limit' => ['name' => 'limit', 'type' => Type::int()],
            'page' => ['name' => 'page', 'type' => Type::int()]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return $this->categoryService->findCategory((int) $args['id']);
        }

        return $this->categoryService->findAllCategories(
            $args['limit'] ?? env('GRAPHQL_LIMIT', 10),
            $args['page'] ?? env('GRAPHQL_PAGE', 1)
        );
    }
}
