<?php

namespace Danydev\Rocket\Views\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component {
    public array $breadcrumbs;
    public string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(array $breadcrumbs, string $title) {
        $this->breadcrumbs = $breadcrumbs;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('rocket::components.breadcrumb');
    }
}
