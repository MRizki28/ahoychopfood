<?php

namespace App\Providers;

use App\Interfaces\MenuInterfaces;
use App\Repositories\MenuRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
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
