<?php

namespace Danydevco\Rocket\Services\form;

class InputTypes {
    public static function getTypes(): array {
        return [
            'text',
            'password',
            'email',
            'url',
            'tel',
            'number',
            'range',
            'date',
            'datetime-local',
            'month',
            'week',
            'time',
            'color',
            'search',
            'file',
            'checkbox',
            'radio',
            'hidden',
            'image',
            'submit',
            'reset',
            'button',
        ];
    }
}
