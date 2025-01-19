<?php

namespace Danydevco\Rocket\builders;

use Danydevco\Rocket\dto\InputDTO;
use Danydevco\Rocket\mappers\InputStyleMapper;

class InputBuilder extends BaseBuilder {

    protected InputDTO         $inputDTO;
    protected InputStyleMapper $mapper;

    public function __construct(InputStyleMapper $mapper, InputDTO $inputDTO) {
        $this->mapper   = $mapper;
        $this->inputDTO = $inputDTO;
    }

    public static function create(InputDTO $inputDTO): self {
        return new self(new InputStyleMapper(), $inputDTO);
    }

    public function build(): array {

        // Definir el array de atributos
        $attributes = [];

        // Agregar ID
        $this->addAttribute($attributes, 'id', $this->buildElementId($this->inputDTO->id));

        // Agregar estilos
        $this->addAttribute($attributes, 'style', $this->getStylesString($this->inputDTO->styles));

        // Agregar tipo, nombre y valor
        $this->addAttribute($attributes, 'type', $this->inputDTO->type);
        $this->addAttribute($attributes, 'name', $this->inputDTO->name);
        $this->addAttribute($attributes, 'value', $this->inputDTO->value);

        // Agregar clases como un atributo
        $classes = [
            $this->mapper->mapSize($this->inputDTO->size),
            $this->mapper->mapHierarchy($this->inputDTO->hierarchy),
        ];
        $this->addAttribute($attributes, 'class', $this->arrayToString($classes));

        return [
            'attributes' => $this->getAttributesString($attributes),
            'containerClass' => $this->getClassString($this->inputDTO->containerClass),
        ];
    }

    protected function getClassString(?array $classes): string {
        if (!$classes) {
            return '';
        }
        return implode(' ', $classes);
    }

    protected function buildValue(?string $value): string {
        return $value ? ' value="' . $value . '"' : '';
    }
}

