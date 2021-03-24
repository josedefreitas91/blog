<?php

namespace CountriesTest\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use CountriesTest\Console\Commands\Task;
use CountriesTest\Providers\SeedProvider;
use Schema;

class RegisterProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        $this->loadRoutesFrom(__DIR__.'/../app/helpers.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');

        Schema::defaultStringLength(191);
        
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        /*
         |--------------------------------------------------------------------------
         | Seed Service Provider need on boot() method
         |--------------------------------------------------------------------------
         */
         $this->app->register(SeedProvider::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        $this->commands([
            task::class,
        ]);
    }
}