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
        $this->publishes([
            __DIR__ . '/config.php' => config_path('laas.php'),
        ]);
    }

    public function provides(): array
    {
        return ['laas'];
    }
}
