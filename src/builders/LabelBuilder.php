<?php

namespace Danydevco\Rocket\builders;

use Danydevco\Rocket\dto\LabelDTO;
use Danydevco\Rocket\mappers\LabelStyleMapper;

class LabelBuilder extends BaseBuilder {

    protected LabelDTO         $labelDTO;
    protected LabelStyleMapper $mapper;

    public function __construct(LabelStyleMapper $mapper, LabelDTO $labelDTO) {
        $this->mapper   = $mapper;
        $this->labelDTO = $labelDTO;
    }

    public static function create(LabelDTO $labelDTO): self {
        return new self(new LabelStyleMapper(), $labelDTO);
    }

    public function build(): array {

        // Definir el array de atributos
        $attributes = [];

        // Agregar ID
        $this->addAttribute($attributes, 'id', $this->buildElementId($this->labelDTO->id));

        // Agregar for
        $this->addAttribute($attributes, 'for', $this->labelDTO->for);

        // Agregar estilos
        $this->addAttribute($attributes, 'style', $this->getStylesString($this->labelDTO->styles));

        // Agregar clases como un atributo
        $classes = [
            $this->mapper->mapSize($this->labelDTO->size),
            $this->mapper->mapHierarchy($this->labelDTO->hierarchy),
        ];
        $this->addAttribute($attributes, 'class', $this->arrayToString($classes));

        return [
            'attributes' => $this->getAttributesString($attributes),
            'containerClass' => $this->arrayToString($this->labelDTO->containerClass),
            'text' => $this->labelDTO->text,
        ];

    }

}

