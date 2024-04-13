<?php

namespace DeveloperHouse\Rocket\Views\Components;

use DeveloperHouse\Rocket\Builders\Table\TableBuilder;
use Illuminate\View\Component;

class TableComponent extends Component {

    public TableBuilder $table;

    /**
     * @param TableBuilder $table
     */
    public function __construct(TableBuilder $table) {
        $this->table = $table;
    }


    public function render() {
        return view('rocket::components.table')->with([
            'table' => $this->table,
        ]);
    }
}