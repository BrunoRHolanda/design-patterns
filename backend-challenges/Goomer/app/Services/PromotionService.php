<?php


namespace Challenge\Goomer\app\Services;


use App\Repositories\PromotionRepository;

class PromotionService
{
    private $promotionRepository;

    public function __construct(PromotionRepository $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }

    public function findAllPromotion(int $limit, int $page)
    {
        $this->promotionRepository->all($limit, $page);
    }
}
