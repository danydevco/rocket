<?php

namespace Danydevco\Rocket\dto;

class InputDTO {
    public ?string $type;
    public ?string $id;
    public ?string $name;
    public ?string $value;
    public ?string $hierarchy;
    public ?string $size;
    public ?string $containerClass;
    public ?array  $attributes;
    public ?array  $styles;

    public function __construct(
        ?string $type,
        ?string $id,
        ?string $name,
        ?string $value,
        ?string $hierarchy,
        ?string $size,
        ?string $containerClass,
        ?array  $attributes,
        ?array  $styles,
    ) {
        $this->type       = $type;
        $this->id         = $id;
        $this->name       = $name;
        $this->value      = $value;
        $this->hierarchy  = $hierarchy;
        $this->size       = $size;
        $this->containerClass = $containerClass;
        $this->attributes = $attributes;
        $this->styles     = $styles;
    }
}
