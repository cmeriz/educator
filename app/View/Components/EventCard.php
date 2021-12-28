<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\View\Component;

class EventCard extends Component
{

    public $event, $class, $controls;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Event $event, $class = '', $controls = false)
    {
        $this->event = $event;
        $this->class = $class;
        $this->controls = $controls;
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
