<?php

namespace Danydev\Rocket;

class Start {

    protected $name;

    /**
     * @param string $name
     */
    public function __construct(string $name = "Dany") {
        $this->name = $name;
    }

    public function hello(){
        return "Mi msg $this->name";
    }

}