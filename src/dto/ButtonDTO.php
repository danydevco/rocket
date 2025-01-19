<?php

namespace Danydevco\Rocket\dto;

namespace Danydevco\Rocket\dto;

class ButtonDTO {
    public ?string $id;
    public ?array  $class;
    public ?array  $styles;
    public string  $text;
    public ?string $hierarchy;
    public ?string $size;
    public ?string $color;
    public ?string $rounded;
    public ?string $shadow;
    public ?string $hover;
    public ?string $active;
    public ?string $focus;
    public ?string $transition;
    public ?string $duration;
    public ?string $ease;
    public ?string $transform;
    public ?bool   $disabled;
    public ?array  $attributes;
    public ?string $type;
    public ?string $containerClass;

    public function __construct(
        ?string $id = null,
        ?array  $class = [],
        ?array  $styles = [],
        string  $text = null,
        ?string $hierarchy = null,
        ?string $size = null,
        ?string $color = null,
        ?string $rounded = null,
        ?string $shadow = null,
        ?string $hover = null,
        ?string $active = null,
        ?string $focus = null,
        ?string $transition = null,
        ?string $duration = null,
        ?string $ease = null,
        ?string $transform = null,
        ?bool   $disabled = false,
        ?array  $attributes = [],
        ?string $type = null,
        ?string $containerClass = null,
    ) {
        $this->id             = $id;
        $this->class          = $class;
        $this->styles         = $styles;
        $this->text           = $text;
        $this->hierarchy      = $hierarchy;
        $this->size           = $size;
        $this->color          = $color;
        $this->rounded        = $rounded;
        $this->shadow         = $shadow;
        $this->hover          = $hover;
        $this->active         = $active;
        $this->focus          = $focus;
        $this->transition     = $transition;
        $this->duration       = $duration;
        $this->ease           = $ease;
        $this->transform      = $transform;
        $this->disabled       = $disabled;
        $this->attributes     = $attributes;
        $this->type           = $type;
        $this->containerClass = $containerClass;
    }
}
