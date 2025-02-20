<?php

namespace Danydevco\Rocket\builders\Table;

use Illuminate\Support\Collection;

class HeaderBuilder {
    private Collection $cells;

    public function __construct() {
        $this->cells = new Collection();
    }

    public function addCell($cell): void {
        $this->cells->push($cell);
    }

    public function getCells(): Collection {
        return $this->cells;
    }
}
