<?php


namespace App\Services;


use App\Entities\Category;
use App\Repositories\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class CategoryService
{
    private $categoryRepository;

    function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function findAllCategories(int $limit, int $page)
    {
        return $this->categoryRepository->all($limit, $page);
    }

    /**
     * @param $category
     * @return Category
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function saveCategory($category): Category
    {
        return $this->categoryRepository->save($category);
    }

    public function findCategory(int $id)
    {
        return $this->categoryRepository->find($id);
    }

    /**
     * @param $category
     * @return Category
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function removeCategory($category)
    {
        return $this->categoryRepository->remove($category);
    }
}
