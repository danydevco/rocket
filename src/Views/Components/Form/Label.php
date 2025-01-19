<?php

namespace Danydevco\Rocket\Views\Components\Form;

use Danydevco\Rocket\builders\LabelBuilder;
use Danydevco\Rocket\dto\LabelDTO;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component {

    private ?string $mAttributes;
    private string  $mContainerClass;
    private string  $text;

    public function __construct(
        string  $text,
        ?string $for = null,
        ?string $id = null,
        ?string $size = 'md',
        ?string $hierarchy = null,
        ?string $containerClass = null,
        ?array  $attributes = [],
        ?array  $styles = []
    ) {
        $this->initializeInputWithParams($text, $id, $size, $hierarchy, $containerClass, $attributes, $styles, $for);
    }

    public function render(): View|Htmlable|string|\Closure {
        return $this->view('rocket::components.form.label')->with([
            'mAttributes' => $this->mAttributes,
            'mContainerClass' => $this->mContainerClass,
            'text' => $this->text,
        ]);
    }

    private function buildILabelFromDTO(LabelDTO $dto): void {

        $builder = LabelBuilder::create($dto);
        $result  = $builder->build();

        $this->mContainerClass = $result['containerClass'];
        $this->mAttributes     = $result['attributes'];
        $this->text            = $result['text'];
    }

    private function initializeInputWithParams(
        string  $text,
        ?string $id,
        ?string $size,
        ?string $hierarchy,
        ?string $containerClass,
        ?array  $attributes,
        ?array  $styles,
        ?string $for
    ): void {

        $dto = new LabelDTO(
            $text,
            $id,
            $size,
            $hierarchy,
            $containerClass,
            $attributes,
            $styles,
            $for
        );

        $this->buildILabelFromDTO($dto);

    }

}
