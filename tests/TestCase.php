<?php

namespace Danydev\Rocket\Tests;

use Danydev\Rocket\Facades\Rocket;
use Danydev\Rocket\Providers\RocketServiceProvider;

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
