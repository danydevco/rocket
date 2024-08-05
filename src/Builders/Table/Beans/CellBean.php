<?php

namespace Danydevco\Rocket\Builders\Table\Beans;

class CellBean {

    public string      $type     = 'text';
    public string      $colClass = 'col';
    public string|null $label    = '';

    public string $title      = '';
    public string $titleClass = 'title';

    public string|null $subtitle      = '';
    public string      $subtitleClass = 'subtitle';

    public bool        $isLink = false;
    public string|null $link   = '';
    public string      $target = '_self';

    public array $dropdown = [];

    public string|null $buttonClass = '';
    public string|null $icon        = '';

    public function __construct(array $params = []) {
        $attributes = array_keys(get_object_vars($this));

        foreach ($attributes as $attribute) {
            if (array_key_exists($attribute, $params)) {

                if ($attribute === 'type' && !in_array($params[$attribute], [
                        'text', 'button', 'dropdown', 'icon', 'link', 'action',
                    ])) {
                    throw new \InvalidArgumentException('Invalid type');
                }

                $this->$attribute = $params[$attribute];
            }
        }
    }


}