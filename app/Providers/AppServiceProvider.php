<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
           // Fix for MySQL < 5.7.7 and MariaDB < 10.2.2
           Schema::defaultStringLength(191); //Update defaultStringLength

         
           Paginator::useBootstrap();
    }
}
