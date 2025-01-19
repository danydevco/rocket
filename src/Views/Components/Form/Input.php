<?php

namespace Danydevco\Rocket\Views\Components\Form;

use Danydevco\Rocket\builders\InputBuilder;
use Danydevco\Rocket\dto\InputDTO;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component {

    private ?string $mAttributes;
    private string  $mContainerClass;

    public function __construct(
        string  $name,
        string  $id,
        ?string $type = 'text',
        ?string $value = null,
        ?string $hierarchy = 'basic',
        ?string $size = 'md',
        ?string $containerClass = null,
        ?array  $attributes = [],
        ?array  $styles = []
    ) {
        $this->initializeInputWithParams($type, $id, $name, $value, $hierarchy, $size, $containerClass, $attributes, $styles);
    }

    public function render(): View|Htmlable|string|\Closure {
        return $this->view('rocket::components.form.input')->with([
            'mAttributes' => $this->mAttributes,
            'mContainerClass' => $this->mContainerClass,
        ]);
    }

    /**
     * Utiliza ButtonBuilder para construir el botón a partir del ButtonDTO.
     */
    private function buildInputFromDTO(InputDTO $dto): void {

        $builder = InputBuilder::create($dto);
        $result  = $builder->build();

        $this->mContainerClass = $result['containerClass'];
        $this->mAttributes     = $result['attributes'];

    }

    private function initializeInputWithParams(
        ?string $type,
        ?string $id,
        ?string $name,
        ?string $value,
        ?string $hierarchy,
        ?string $size,
        ?string $containerClass,
        ?array  $attributes,
        ?array  $styles
    ): void {

        $dto = new InputDTO(
            $type,
            $id,
            $name,
            $value,
            $hierarchy,
            $size,
            $containerClass,
            $attributes,
            $styles
        );

        $this->buildInputFromDTO($dto);

    }

}
