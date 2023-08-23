<?php

namespace DeveloperHouse\Rocket\Tests;

use DeveloperHouse\Rocket\Facades\Rocket;
use DeveloperHouse\Rocket\Providers\RocketServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase {
    protected function getPackageProviders($app) {
        return [
            RocketServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app) {
        return [
            'Rocket' => Rocket::class,
        ];
    }
}
