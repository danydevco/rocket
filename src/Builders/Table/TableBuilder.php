<?php

namespace Danydevco\Rocket\Builders\Table;

use Illuminate\Support\Collection;

class TableBuilder {
    private Collection $headers;
    private Collection $rows;
    private string $tableClass;

    public function __construct() {
        $this->headers = new Collection();
        $this->rows    = new Collection();
        $this->tableClass = 'rocket-table-basic';
    }

    public function addHeader(HeaderBuilder $header): void {
        $this->headers = $header->getCells();
    }

    public function getHeaders(): Collection {
        return $this->headers;
    }

    // para los row
    public function addRow(RowBuilder $row): void {
        $this->rows->push($row->getCells());
    }

    public function getRows(): Collection {
        return $this->rows;
    }

    public function setTableClass(string $tableClass): void {
        $this->tableClass = $tableClass;
    }

    public function getTableClass(): string {
        return $this->tableClass;
    }
}