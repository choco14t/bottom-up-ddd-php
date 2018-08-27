<?php

namespace App\Providers;

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
    }
}
