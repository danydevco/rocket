<?php

namespace Danydevco\Rocket\Views\Components\Form;

use Danydevco\Rocket\builders\ButtonBuilder;
use Danydevco\Rocket\dto\ButtonDTO;
use Illuminate\View\Component;

class Button extends Component {

    private string  $containerClass;
    private string  $class;
    private ?string $mAttributes;
    private string  $text;

    public function __construct(
        string $id = null,
        array  $class = [],
        array  $styles = [],
        string $text = null,
        string $hierarchy = 'solid',
        string $size = 'md',
        string $color = null,
        string $rounded = 'default',
        string $shadow = null,
        string $hover = null,
        string $active = null,
        string $focus = null,
        string $transition = null,
        string $duration = null,
        string $ease = null,
        string $transform = null,
        bool   $disabled = false,
        array  $attributes = [],
        string $type = 'submit',
    ) {
        $this->initializeButtonWithParams(
            $id, $class, $styles, $text, $hierarchy, $size, $color, $rounded, $shadow, $hover, $active, $focus,
            $transition, $duration, $ease, $transform, $disabled, $attributes, $type
        );
    }

    /**
     * Utiliza ButtonBuilder para construir el botón a partir del ButtonDTO.
     */
    private function buildButtonFromDTO(ButtonDTO $dto): void {
        $builder = ButtonBuilder::create($dto);
        $result  = $builder->build();

        $this->class       = $result['class'];
        $this->mAttributes = $result['attributes'];
        $this->text        = $result['text'];
        $this->containerClass = $result['containerClass'];
    }

    public function render() {
        return view('rocket::components.form.button', [
            'class' => $this->class,
            'mAttributes' => $this->mAttributes,
            'text' => $this->text,
            'containerClass' => $this->containerClass,
        ]);
    }

    /**
     * Inicializa las propiedades del botón a partir de los parámetros individuales proporcionados.
     */
    private function initializeButtonWithParams(
        ?string $id,
        ?array  $class,
        ?array  $styles,
        string $text,
        ?string $hierarchy,
        ?string $size,
        ?string $color,
        ?string $rounded,
        ?string $shadow,
        ?string $hover,
        ?string $active,
        ?string $focus,
        ?string $transition,
        ?string $duration,
        ?string $ease,
        ?string $transform,
        ?bool   $disabled,
        ?array  $attributes,
        ?string $type): void {

        $dto = new ButtonDTO(
            $id,
            $class,
            $styles,
            $text,
            $hierarchy,
            $size,
            $color,
            $rounded,
            $shadow,
            $hover,
            $active,
            $focus,
            $transition,
            $duration,
            $ease,
            $transform,
            $disabled,
            $attributes,
            $type
        );

        $this->buildButtonFromDTO($dto);

    }


}
