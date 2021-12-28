<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class EventsWelcome extends Component
{
    public $day;

    public function render()
    {

        $events = Event::where('user_id', auth()->user()->id)
                       ->where('day', $this->day)
                       ->orderBy('day')
                       ->orderBy('start')
                       ->get();

        return view('livewire.events.events-welcome', compact('events'));
    }
}
