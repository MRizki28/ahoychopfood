<?php

namespace App\Providers;

use App\Interfaces\AuthInterfaces;
use App\Interfaces\InformationInterfaces;
use App\Interfaces\MenuInterfaces;
use App\Repositories\AuthRepositories;
use App\Repositories\InformationRepositories;
use App\Repositories\MenuRepositories;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MenuInterfaces::class, MenuRepositories::class);
        $this->app->bind(AuthInterfaces::class, AuthRepositories::class);
        $this->app->bind(InformationInterfaces::class, InformationRepositories::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
