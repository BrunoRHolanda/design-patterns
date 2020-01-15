<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Services\ProductService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class ProductQuery extends Query
{
    protected $attributes = [
        'name' => 'productQuery',
        'description' => 'Query para lidar com o filtro de produtos'
    ];

    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function type(): Type
    {
        return GraphQL::type('ProductUnion');
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
            return $this->productService->findProduct($args['id']);
        }

        return $this->productService->findAllProducts(
            $args['limit'] ?? env('GRAPHQL_LIMIT', 10),
            $args['page'] ?? env('GRAPHQL_PAGE', 1)
        );
    }
}
