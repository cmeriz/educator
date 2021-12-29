<?php

namespace App\Http\Livewire\Events;

use App\Models\Course;
use App\Models\Event;
use Livewire\Component;

class EventEdit extends Component
{

    public $open = false;
    public $event, $course_id, $day, $start, $end; 

    protected $rules = [
        'day' => 'required',
        'start' => 'required|before:end',
        'end' => 'required|after:start',
        'course_id' => 'required',
    ];

    protected $messages = [
        'day.required' => 'Este campo es obligatorio',
        'start.required' => 'Este campo es obligatorio',
        'start.before' => 'La hora de inicio debe ser menor a la hora de fin',
        'end.required' => 'Este campo es obligatorio',
        'end.after' => 'La hora de fin debe ser mayor a la hora de inicio',
        'course_id.required' => 'Este campo es obligatorio',
    ];

    protected $listeners = [
        'eventEdit' => 'editing',
    ];

    public function mount(){
        $this->event = new Event();
    }

    public function render()
    {
        $courses = Course::where('user_id', auth()->user()->id)->get();
        return view('livewire.events.event-edit', compact('courses'));
    }

    public function editing(Event $event){
        $this->event = $event;
        $this->course_id = $this->event->course_id;
        $this->day = $this->event->day;
        $this->start = $this->event->start;
        $this->end = $this->event->end;
        $this->open = true;
    }

    public function update(){

        $this->event->course_id = $this->course_id;
        $this->event->day = $this->day;
        $this->event->start = $this->start;
        $this->event->end = $this->end;

        $this->event->save();

        $this->reset(['open', 'event', 'course_id', 'day', 'start', 'end']);

        $this->emitTo('events.events-index', 'render');
        $this->emit('alert', 'success', '¡El evento fue actualizado exitosamente!');

    }

}
