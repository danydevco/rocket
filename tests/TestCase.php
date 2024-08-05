<?php

namespace Danydevco\Rocket\Tests;

use Danydevco\Rocket\Facades\Rocket;
use Danydevco\Rocket\Providers\RocketServiceProvider;

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
