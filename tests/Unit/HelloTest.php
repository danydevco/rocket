<?php

namespace Danydevco\Rocket\Tests\Unit;

use Danydevco\Rocket\Facades\Rocket;
use Danydevco\Rocket\Tests\TestCase;

class HelloTest extends TestCase {


    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void {
        $this->assertEquals("Mi msg Dany", Rocket::hello());
    }
}
