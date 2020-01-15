<?php


namespace App\Providers;


use App\Entities\Category;
use App\Entities\Operation;
use App\Entities\Product;
use App\Entities\Promotion;
use App\Entities\Restaurant;
use App\Entities\Validity;
use App\Repositories\CategoryRepository;
use App\Repositories\OperationRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PromotionRepository;
use App\Repositories\RestaurantRepository;
use App\Repositories\ValidityRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // repositories
        $this->bindCategoryRepository();
        $this->bindOperationRepository();
        $this->bindProductRepository();
        $this->bindPromotionRepository();
        $this->bindRestaurantRepository();
        $this->bindValidityRepository();
    }

    private function bindCategoryRepository()
    {
        $this->app->bind(CategoryRepository::class, function($app) {
            return new CategoryRepository($app['em'], $app['em']->getClassMetaData(Category::class));
        });
    }

    private function bindOperationRepository()
    {
        $this->app->bind(OperationRepository::class, function($app) {
            return new OperationRepository($app['em'], $app['em']->getClassMetaData(Operation::class));
        });
    }

    private function bindProductRepository()
    {
        $this->app->bind(ProductRepository::class, function($app) {
            return new ProductRepository($app['em'], $app['em']->getClassMetaData(Product::class));
        });
    }

    private function bindPromotionRepository()
    {
        $this->app->bind(PromotionRepository::class, function($app) {
            return new PromotionRepository($app['em'], $app['em']->getClassMetaData(Promotion::class));
        });
    }

    private function bindRestaurantRepository()
    {
        $this->app->bind(RestaurantRepository::class, function($app) {
            return new RestaurantRepository($app['em'], $app['em']->getClassMetaData(Restaurant::class));
        });
    }

    private function bindValidityRepository()
    {
        $this->app->bind(ValidityRepository::class, function($app) {
            return new ValidityRepository($app['em'], $app['em']->getClassMetaData(Validity::class));
        });
    }
}
