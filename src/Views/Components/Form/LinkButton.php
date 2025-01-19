<?php

namespace Danydevco\Rocket\Views\Components\Form;

use Illuminate\View\Component;

class LinkButton extends Component {

    public $id;
    public $class;
    public $text;
    public $attributes;
    public $style;

    public function __construct(
        $id = null,
        $class = '',
        $text = null,
        $attributes = [],
        $style = 'solid') {
        $this->id         = $id;
        $this->class      = is_array($class) ? implode(' ', $class) : $class;
        $this->text       = $text;
        $this->attributes = $attributes;
        $this->style      = $style;
    }


    public function render() {
        return $this->view('rocket::components.form.linkButton')->with([
            'mClass' => $this->getClass(),
            'mAttributes' => $this->getAttributes(),
            'mId' => $this->getInputId(),
        ]);
    }

    function getClass(): string {
        return 'block w-full px-3 py-2 text-sm font-normal leading-6 bg-white border rounded-md appearance-none transition-colors ease-in-out duration-150 focus:outline-none focus:border-gray-400';
    }

    function getAttributes(): string {
        $attributes = '';
        foreach ($this->attributes as $key => $value) {
            $attributes .= $key . '="' . $value . '" ';
        }
        return $attributes;
    }



}
