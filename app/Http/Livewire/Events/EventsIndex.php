<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventsIndex extends Component
{

    use AuthorizesRequests;

    protected $listeners = [
        'render',
        'eventDelete' => 'destroy',
    ];

    public function render()
    {
        // Getting all user's events ordered by day and time
        $events = Event::where('user_id', auth()->user()->id)
                       ->orderBy('day')
                       ->orderBy('start')
                       ->get();

        // Creating events associative array 
        // ['day' => ['event']]
        $eventsByDay = Array();

        if(count($events) > 0){
            // Filling Keys (days)
            foreach(Event::DAYS as $day){
                $eventsByDay[$day] = null;
            }

            // Filling Values (events)
            foreach ($events as $event) {
                $eventsByDay[$event->day][] = $event;
            }
        }  

        return view('livewire.events.events-index', compact('eventsByDay'));
    }

    public function destroy(Event $event){

        // Verifying if user is event's owner
        $this->authorize('owner', $event);

        // Destroying event register
        $event->delete();

        // Resetting component & showing results
        $this->emit('alert', 'success', '¡El evento fue eliminado exitosamente!');
        $this->emitSelf('render');
    
    }

}
