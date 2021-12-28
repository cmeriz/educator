<?php

namespace App\Http\Livewire\Events;

use App\Models\Course;
use App\Models\Event;
use Livewire\Component;

class EventCreate extends Component
{

    public $open = false;
    public $course_id, $day, $start, $end;

    protected $rules = [
        'day' => 'required',
        'start' => 'required|before:end',
        'end' => 'required|after:start',
        'course_id' => 'required',
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
