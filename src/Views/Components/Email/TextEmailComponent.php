<?php

namespace DeveloperHouse\Rocket\Views\Components\Email;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextEmailComponent extends Component {
    public string $text;
    public array  $styles;

    /**
     * Create a new component instance.
     */
    public function __construct(string $text, array $styles) {
        $defaultStyles = [
            'text-align' => 'left',
            'padding' => '0',
            'color' => '#718096',
            'font-size' => '16px',
            'font-family' => 'Arial, sans-serif',
            'line-height' => '1.5',
            'width' => '100%',
        ];
        $this->text    = $text;
        $this->styles  = array_merge($defaultStyles, $styles);
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
            'text' => $this->text,
            'styles' => $styleString,
        ]);
    }

}
