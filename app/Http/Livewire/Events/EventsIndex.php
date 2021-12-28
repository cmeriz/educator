<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class EventsIndex extends Component
{

    protected $listeners = [
        'render',
    ];

    public function render()
    {
        $events = Event::where('user_id', auth()->user()->id)
                       ->orderBy('day')
                       ->orderBy('start')
                       ->get();
        $eventsByDay = Array();

        foreach ($events as $event) {
            $eventsByDay[$event->day][] = $event;
        }    

        return view('livewire.events.events-index', compact('eventsByDay'));
    }
}
