<?php

namespace App\Providers;

use App\Interfaces\CategoryInterfaces;
use App\Interfaces\MenuInterfaces;
use App\Repositories\CategoryRepositories;
use App\Repositories\MenuRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterfaces::class, CategoryRepositories::class);
        $this->app->bind(MenuInterfaces::class, MenuRepositories::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
