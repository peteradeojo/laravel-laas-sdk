<?php

namespace OneZero\Laas;

use Illuminate\Support\ServiceProvider;

class LaasServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('laas', function () {
            return new Laas();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $config = realpath(__DIR__ . '/../config/laas.php');
        $this->publishes([
            $config => config_path('laas.php'),
        ]);
    }

    public function provides(): array
    {
        return ['laas'];
    }
}
