<?php


namespace App\Services;


use App\Repositories\RestaurantRepository;

class RestaurantService
{
    private $restaurantRepository;

    function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function findAllRestaurants()
    {

    }
}
