<?php

namespace Danydev\Rocket\Facades;

use Illuminate\Support\Facades\Facade;

class Rocket extends Facade {

    protected static function getFacadeAccessor(): string {
        return 'Rocket';
    }

}