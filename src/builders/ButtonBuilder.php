<?php

namespace Danydevco\Rocket\builders;

use Danydevco\Rocket\dto\ButtonDTO;
use Danydevco\Rocket\mappers\ButtonStyleMapper;

class ButtonBuilder {

    protected ButtonDTO         $buttonDTO;
    protected ButtonStyleMapper $mapper;

    public function __construct(ButtonStyleMapper $mapper, ButtonDTO $buttonDTO) {
        $this->mapper    = $mapper;
        $this->buttonDTO = $buttonDTO;
        $this->applyDefaultConfigurations();
    }

    public static function create(ButtonDTO $buttonDTO): self {
        return new self(new ButtonStyleMapper(), $buttonDTO);
    }

    protected function getDefaultConfigurations(): array {
        return [
            'solid' => [
                'color' => 'primary',
                'shadow' => 'md',
                'hover' => 'opacity',
                'active' => 'opacity',
                'focus' => 'primary',
                'transition' => 'all',
                'duration' => '150',
                'ease' => 'in-out',
                'transform' => 'none',
            ],
            'outline' => [
                'color' => 'secondary',
                'shadow' => 'none',
                'hover' => 'opacity',
                'active' => 'opacity',
                'focus' => 'secondary',
                'transition' => 'all',
                'duration' => '150',
                'ease' => 'in-out',
                'transform' => 'none',
            ],
            'link' => [
                'color' => 'primary',
                'shadow' => 'none',
                'hover' => 'none',
                'active' => 'none',
                'focus' => 'none',
                'transition' => 'none',
                'duration' => '150',
                'ease' => 'in-out',
                'transform' => 'none',
            ],
        ];
    }

    protected function applyDefaultConfigurations(): void {
        $defaultConfigs = $this->getDefaultConfigurations();
        $hierarchy      = $this->buttonDTO->hierarchy;

        if (isset($defaultConfigs[$hierarchy])) {
            $config                      = $defaultConfigs[$hierarchy];
            $this->buttonDTO->size       = $this->buttonDTO->size ? : $config['size'];
            $this->buttonDTO->color      = $this->buttonDTO->color ? : $config['color'];
            $this->buttonDTO->rounded    = $this->buttonDTO->rounded ? : $config['rounded'];
            $this->buttonDTO->shadow     = $this->buttonDTO->shadow ? : $config['shadow'];
            $this->buttonDTO->hover      = $this->buttonDTO->hover ? : $config['hover'];
            $this->buttonDTO->active     = $this->buttonDTO->active ? : $config['active'];
            $this->buttonDTO->focus      = $this->buttonDTO->focus ? : $config['focus'];
            $this->buttonDTO->transition = $this->buttonDTO->transition ? : $config['transition'];
            $this->buttonDTO->duration   = $this->buttonDTO->duration ? : $config['duration'];
            $this->buttonDTO->ease       = $this->buttonDTO->ease ? : $config['ease'];
            $this->buttonDTO->transform  = $this->buttonDTO->transform ? : $config['transform'];
        }

    }

    protected function isValidHierarchy(string $hierarchy): bool {
        $validHierarchies = ['solid', 'outline', 'link'];
        return in_array($hierarchy, $validHierarchies, true);
    }

    public function build(): array {
        $classes = [
            $this->mapper->mapSize($this->buttonDTO->size),
            $this->mapper->mapColor($this->buttonDTO->color),
            $this->mapper->mapRounded($this->buttonDTO->rounded),
            $this->mapper->mapShadow($this->buttonDTO->shadow),
            $this->mapper->mapHover($this->buttonDTO->hover),
            $this->mapper->mapActive($this->buttonDTO->active),
            $this->mapper->mapFocus($this->buttonDTO->focus),
            $this->mapper->mapTransition($this->buttonDTO->transition),
            $this->mapper->mapDuration($this->buttonDTO->duration),
            $this->mapper->mapEase($this->buttonDTO->ease),
            $this->mapper->mapTransform($this->buttonDTO->transform),
            $this->mapper->mapDisabled($this->buttonDTO->disabled),
        ];

        $classString      = implode(' ', $classes);
        $attributesString = $this->getAttributesString($this->buttonDTO->attributes);

        return [
            'class' => $classString,
            'attributes' => $attributesString,
            'text' => $this->buttonDTO->text,
            'containerClass' => $this->getClassString($this->buttonDTO->containerClass),
        ];
    }

    protected function getAttributesString(array $attributes): string {

        $attributesString = '';

        $attributes['type'] = $this->buttonDTO->type;

        // Si él, id no es nulo, agregar el atributo id
        if ($this->buttonDTO->id) {
            $attributes['id'] = $this->buttonDTO->id;
        }

        // Inicializar el atributo 'style' si existe
        $styleString = '';

        // Concatenar todos los estilos en un solo string
        if ($this->buttonDTO->styles) {
            foreach ($this->buttonDTO->styles as $key => $value) {
                $styleString .= $key . ': ' . $value . '; ';
            }

            // Asignar el string concatenado al atributo 'style'
            $attributes['style'] = trim($styleString);
        }

        // Si el botón está deshabilitado, agregar el atributo disabled
        if ($this->buttonDTO->disabled) {
            $attributes['disabled'] = 'true';
        }

        foreach ($attributes as $key => $value) {
            $attributesString .= $key . '="' . $value . '" ';
        }

        return trim($attributesString);

    }

    protected function getClassString(?array $classes): string {
        if (!$classes) {
            return '';
        }
        return implode(' ', $classes);
    }
}
