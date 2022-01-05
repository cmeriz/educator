<?php

namespace App\Http\Livewire\Classdays;

use App\Models\Classday;
use Livewire\Component;

class ClassdayCreate extends Component
{
    public $open = false;
    public $course_id, $date;

    protected $rules = [
        'date' => 'required',
    ];

    protected $messages = [
        'date.required' => 'Este campo es obligatorio',
    ];

    protected $listeners = [
        'createClassday' => 'openModal',
    ];

    public function mount($course_id){
        $this->course_id = $course_id;
    }

    public function render()
    {
        return view('livewire.classdays.classday-create');
    }

    public function openModal(){
        $this->open = true;
    }

    public function save(){

        $this->validate();

        Classday::create([
            'date' => $this->date,
            'course_id' => $this->course_id,
        ]);

        $this->reset(['open', 'date']);

        $this->emitTo('attendances.attendances-index', 'render');
        $this->emit('alert', 'success', '¡La clase fue creada exitosamente!');

    }

}
