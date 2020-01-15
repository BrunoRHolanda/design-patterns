<?php


namespace App\Services;


use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findAllProducts(int $limit, int $page)
    {
        return $this->productRepository->all($limit, $page);
    }

    public function findProduct(int $id)
    {
        return $this->productRepository->find($id);
    }
}
