<?php

namespace Danydev\Rocket\Views\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component {

    public $menu
        = [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fas fa-tachometer-alt',
            ],
            [
                'name' => 'Profile',
                'route' => 'profile',
                'icon' => 'fas fa-user',
            ],
            [
                'name' => 'Wallet',
                'route' => 'wallet',
                'icon' => 'fas fa-wallet',
            ],
            [
                'name' => 'Settings',
                'route' => 'settings',
                'icon' => 'fas fa-cog',
            ],
        ];

    /**
     * Create a new component instance.
     */
    public function __construct() {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('rocket::components.sidebar')->with([
            'user' => auth()->user(),
            'menu' => $this->menu,
        ]);
    }
}
