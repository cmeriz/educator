<?php

namespace App\Http\Livewire\Lessons;

use App\Models\Lesson;
use Livewire\Component;

class LessonCreate extends Component
{
    public $open = false;
    public $pensum, $title;

    protected $rules = [
        'title' => 'required|max:50',
    ];

    protected $messages = [
        'title.required' => 'Este campo es obligatorio',
        'title.max' => 'Este campo no puede tener más de 50 caracteres',
    ];

    public function mount($pensum){
        $this->pensum = $pensum;
    }

    public function render()
    {
        return view('livewire.lessons.lesson-create');
    }

    public function save(){

        $this->validate();

        Lesson::create([
            'title' => $this->title,
            'pensum_id' => $this->pensum,
        ]);

        $this->reset(['title', 'open']);
        
        $this->emitTo('lessons.lessons-index', 'render');
        $this->emit('alert', 'success', '¡La lección fue creada exitosamente!');

    }

}
