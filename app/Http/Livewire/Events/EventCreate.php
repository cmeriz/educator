<?php

namespace App\Http\Livewire\Events;

use App\Models\Course;
use App\Models\Event;
use Livewire\Component;

class EventCreate extends Component
{

    public $open = false;
    public $course_id = null;
    public $day = null;
    public $start, $end;

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

    public function render()
    {
        $courses = Course::where('user_id', auth()->user()->id)->get();
        return view('livewire.events.event-create', compact('courses'));
    }

    public function save(){
        $this->validate();

        Event::create([
            'day' => $this->day,
            'start' => $this->start,
            'end' => $this->end,
            'course_id' => $this->course_id,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset(['open', 'course_id', 'day', 'start', 'end']);
        $this->emitTo('events.events-index', 'render');
        $this->emit('alert', 'success', '¡El evento fue creado exitosamente!');

    }
}
