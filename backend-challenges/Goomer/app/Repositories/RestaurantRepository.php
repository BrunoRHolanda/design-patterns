<?php


namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;

class RestaurantRepository extends EntityRepository
{
    use PaginatesFromParams;

    public function all(int $limit = 10, int $page = 1): LengthAwarePaginator
    {
        return $this->paginateAll($limit, $page);
    }
}
