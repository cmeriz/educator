<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $tag;
    public $class;
    public $href;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag = "button", $class = "", $href = "", $type = "")
    {
        $this->tag = $tag;
        $this->class = $class;
        $this->href = $href;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
