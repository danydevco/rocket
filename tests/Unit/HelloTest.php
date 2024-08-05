<?php

namespace Danydev\Rocket\Tests\Unit;

use Danydev\Rocket\Facades\Rocket;
use Danydev\Rocket\Tests\TestCase;

class HelloTest extends TestCase {


    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void {
        $this->assertEquals("Mi msg Dany", Rocket::hello());
    }
}
