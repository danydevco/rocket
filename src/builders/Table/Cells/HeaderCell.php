<?php

namespace Danydevco\Rocket\builders\Table\Cells;

class HeaderCell {
    public string $label;
    public string $class;

    public function __construct(string $label, string $class = 'col') {
        $this->label = $label;
        $this->class   = $class;
    }

}
