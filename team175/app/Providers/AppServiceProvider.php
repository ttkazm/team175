<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //httpsの設定
        if(\App::enviroment(['production']) || \APP::enciroment(['develop'])){
            \URL::forseScheme('https');
        }

    }
}
