<?php

namespace DeveloperHouse\Rocket\Builders\Table\Beans;

class ActionDropdownBean {
    public string $route = '';
    public string $label = '';

    public function __construct(string $route, string $label) {
        $this->route = $route;
        $this->label = $label;
    }

    public function getRoute(): string {
        return $this->route;
    }

    public function getLabel(): string {
        return $this->label;
    }

    public function setRoute(string $route): void {
        $this->route = $route;
    }

    public function setLabel(string $label): void {
        $this->label = $label;
    }

    
}