<?php


namespace App\Providers;


use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PromotionRepository;
use App\Services\CategoryService;
use App\Services\ProductService;
use Challenge\Goomer\app\Services\PromotionService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServicesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //services
        $this->bindCategoryService();
        $this->bindProductService();
        $this->bindPromotionService();
    }

    private function bindCategoryService()
    {
        $this->app->bind(CategoryService::class, function ($app) {
            /**
             * The application instance.
             *
             * @var Application $app
             */
            return new CategoryService($app->make(CategoryRepository::class));
        });
    }

    private function bindProductService()
    {
        $this->app->bind(ProductService::class, function ($app) {
            /**
             * The application instance.
             *
             * @var Application $app
             */
            return new ProductService($app->make(ProductRepository::class));
        });
    }

    private function bindPromotionService()
    {
        $this->app->bind(PromotionRepository::class, function ($app) {
            /**
             * The application instance.
             *
             * @var Application $app
             */
            return new PromotionService($app->make(PromotionRepository::class));
        });
    }
}
