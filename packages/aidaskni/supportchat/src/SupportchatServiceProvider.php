<?php

namespace Aidaskni\Supportchat;

use Illuminate\Support\ServiceProvider;

class SupportchatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       // include __DIR__ . '/../routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->publishes([
            __DIR__ . '/../config/supportchat.php' => config_path('supportchat.php'),
            __DIR__ . '/views' => resource_path('views/supportchat'),
        ]);


        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadViewsFrom(__DIR__ . '/../views/', 'supportchat');
    }
}
