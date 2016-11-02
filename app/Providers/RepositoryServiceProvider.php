<?php
namespace App\Providers;

use App\Entities\Category;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Doctrine\DoctrineCategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepository::class, function() {
            $em = $this->app['em'];

            return new DoctrineCategoryRepository($em, $em->getClassMetaData(Category::class));
        });
    }
}