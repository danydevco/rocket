<?php

namespace DeveloperHouse\Rocket\Tests\Unit;

use DeveloperHouse\Rocket\Facades\Rocket;
use DeveloperHouse\Rocket\Tests\TestCase;

class HelloTest extends TestCase {


    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void {
        $this->assertEquals("Mi msg Dany", Rocket::hello());
    }
}
