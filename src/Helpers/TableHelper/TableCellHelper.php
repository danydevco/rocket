<?php

namespace DeveloperHouse\Rocket\Helpers\TableHelper;

class TableCellHelper {
    /**
     * @param string $label
     * @param string|null $colClass
     * @param string|null $value
     * @param string|null $valueClass
     *
     * @return TableBean
     */
    public function createCell(
        string $label, string $colClass = null, string $value = null, string $valueClass = null
    ): TableBean {

        $cell = new TableBean();

        $cell->label = $label;

        if ($colClass) {
            $cell->colClass = $colClass;
        }

        if ($value) {
            $cell->value = $value;
        }

        if ($valueClass) {
            $cell->valueClass = $valueClass;
        }

        return $cell;
    }

    public function create(array $params): TableBean {

        $cell       = new TableBean();
        $attributes = array_keys(get_object_vars($cell));

        foreach ($attributes as $attribute) {
            if (array_key_exists($attribute, $params)) {
                $cell->$attribute = $params[$attribute];
            }
        }

        return $cell;

    }

    public function createDetailButton(
        string $link,
        string $target = '_blank',
        string $icon = 'fa-regular fa-eye',
        string $classButton = 'btn border-0'
    ): TableBean {
        return $this->create([
            'colClass' => 'col-1 col-option',
            'isButton' => true,
            'classButton' => $classButton,
            'icon' => $icon,
            'link' => $link,
            'target' => $target,
        ]);
    }

}
