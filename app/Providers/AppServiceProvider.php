<?php

namespace App\Providers;

use BottomUpDDD\Domain\UnitOfWorkSample\UnitOfWorkInterface;
use BottomUpDDD\Domain\Users\UserFactoryInterface;
use BottomUpDDD\ProductInfrastructure\UnitOfWorkSample\UnitOfWork;
use BottomUpDDD\ProductionInfrastructure\Users\UserFactory;
use Illuminate\Support\ServiceProvider;
use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use BottomUpDDD\ProductionInfrastructure\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserFactoryInterface::class, UserFactory::class);
        $this->app->bind(UnitOfWorkInterface::class, UnitOfWork::class);
    }
}
