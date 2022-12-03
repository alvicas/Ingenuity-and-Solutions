<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class NavBar extends Component
{
    /**
     * authUserName.
     *
     * @var string
     */
    public $authUserName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $authUserName)
    {
        $this->authUserName = $authUserName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-bar');
    }
}
