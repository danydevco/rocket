<?php

namespace DeveloperHouse\Rocket\Views\Components\Email;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextEmailComponent extends Component {
    public string $type = '';
    public array  $styles;

    /**
     * @param array  $styles
     * @param string $type
     */
    public function __construct(array $styles = [], string $type = 'paragraph') {
        $this->type = $type;

        $customStyles = match ($type) {
            'title' => $this->getStyleTitle(),
            'subtitle' => $this->getStyleSubtitle(),
            'paragraph' => $this->getStyleParagraph(),
            default => [],
        };

        $this->styles  = array_merge($customStyles, $styles);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {

        $styleString = '';
        foreach ($this->styles as $key => $value) {
            $styleString .= $key . ': ' . $value . '; ';
        }

        return view('rocket::components.email.text')->with([
            'styleString' => $styleString,
        ]);
    }

    private function getStyleTitle(): array {
        return [
            'text-align' => 'center',
            'font-size' => '18px',
            'color' => '#022047',
            'font-weight' => '600',
            'margin-bottom' => '12px',
        ];
    }

    private function getStyleSubtitle(): array {
        return [
            'text-align' => 'left',
            'font-size' => '16px',
            'color' => '#718096',
            'font-weight' => '500',
            'margin-bottom' => '12px',
        ];
    }

    private function getStyleParagraph(): array {
        return [
            'text-align' => 'left',
            'font-size' => '16px',
            'color' => '#718096',
            'font-weight' => '400',
            'margin-bottom' => '12px',
        ];
    }



}
