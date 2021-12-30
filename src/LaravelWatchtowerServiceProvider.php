<?php

namespace LyneTechnologies\LaravelWatchtower;

use Illuminate\Support\ServiceProvider;
use LyneTechnologies\LaravelWatchtower\Console\Test;

class LaravelWatchtowerServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-watchtower.php', 'laravel-watchtower');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/laravel-watchtower.php' => config_path('laravel-watchtower.php'),
            ], 'config');

            if (! class_exists('CreateErrorsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_errors_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_errors_table.php'),
                ], 'migrations');
            }
            $this->commands([
                Test::class,
            ]);
        }
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-watchtower');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
