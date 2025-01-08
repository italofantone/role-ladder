<?php

namespace Italofantone\RoleLadder\Tests;

use Illuminate\Support\Facades\Config;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected $ladderSteps = [
        'admin' => 900,
        'user'  => 100,
    ];

    protected function setUp(): void
    {
        parent::setUp();

        // Load migrations from the testing package
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Load migrations from the package
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        Config::set('role-ladder.steps', $this->ladderSteps);
    }    
}