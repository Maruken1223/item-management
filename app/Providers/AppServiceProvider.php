<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Pagination\Paginator::useBootstrap();

        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        if (\App::enviroment(['production'])){
            \URL::forceScheme('https');
        }
    }
}
