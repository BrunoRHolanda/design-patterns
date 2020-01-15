<?php


namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class PromotionRepository extends EntityRepository
{
    use PaginatesFromParams;

    /**
     * @param int $limit
     * @param int $page
     * @return LengthAwarePaginator
     */
    public function all(int $limit, int $page): LengthAwarePaginator
    {
        return $this->paginateAll($limit, $page);
    }
}
