<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventCard extends Component
{

    public $name, $start, $end, $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $start, $end, $color)
    {
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event-card');
    }
}
