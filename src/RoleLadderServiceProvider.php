<?php

namespace Italofantone\RoleLadder;

use Illuminate\Support\ServiceProvider;

class RoleLadderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/role-ladder.php', 'role-ladder'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/role-ladder.php' => config_path('role-ladder.php'),
        ], 'role-ladder-config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
