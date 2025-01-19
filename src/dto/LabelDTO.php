<?php

namespace Danydevco\Rocket\dto;

class LabelDTO {
    public string  $text;
    public ?string  $id;
    public ?string $size;
    public ?string $hierarchy;
    public ?string $containerClass;
    public ?array  $attributes;
    public ?array  $styles;
    public ?string $for;
    public function __construct(
        string  $text,
        ?string  $id,
        ?string $size,
        ?string $hierarchy,
        ?string $containerClass,
        ?array  $attributes,
        ?array  $styles,
        ?string $for
    ) {
        $this->text           = $text;
        $this->id             = $id;
        $this->size           = $size;
        $this->hierarchy      = $hierarchy;
        $this->containerClass = $containerClass;
        $this->attributes     = $attributes;
        $this->styles         = $styles;
        $this->for            = $for;
    }
}
