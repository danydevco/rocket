<?php

namespace Danydev\Rocket\Builders\Table\Beans;

class ActionDropdownBean {
    public string $label = '';
    public string $route = '';
    public string $icon  = '';

    public function __construct(string $label, string $route, string $icon = '') {
        $this->label = $label;
        $this->route = $route;
        $this->icon  = $icon;
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