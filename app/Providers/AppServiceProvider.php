<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use IP2LocationIO\Configuration;
use IP2LocationIO\IPGeolocation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IPGeolocation::class, function (Application $app) {
            return new IPGeolocation(new Configuration(env('WHO_IS_API_KEY') ?? ''));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
