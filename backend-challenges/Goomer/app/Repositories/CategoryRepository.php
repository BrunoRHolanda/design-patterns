<?php


namespace App\Repositories;

use App\Entities\Category;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class CategoryRepository extends EntityRepository
{
    use PaginatesFromParams;

    public function all(int $limit, int $page)
    {
        return $this->paginateAll($limit, $page);
    }
    /**
     * @param $category
     * @return Category
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save($category): Category
    {
        $this->getEntityManager()->persist($category);
        $this->getEntityManager()->flush();

        return $category;
    }

    /**
     * @param $category
     * @return Category
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove($category): Category
    {
        $this->getEntityManager()->remove($category);
        $this->getEntityManager()->flush();

        return $category;
    }
}
