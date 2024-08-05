<?php

namespace Danydev\Rocket\Builders\Table\Cells;

class HeaderCell {
    public string $label;
    public string $class;

    public function __construct(string $label, string $class = 'col') {
        $this->label = $label;
        $this->class   = $class;
    }

}