<?php

namespace App\Http\Livewire\Lessons;

use App\Models\Lesson;
use App\Models\Pensum;
use Livewire\Component;

class LessonsIndex extends Component
{
    public $pensum, $lesson;

    protected $listeners = ['lessonDelete' => 'destroy', 'render'];

    protected $rules = [
        'lesson.title' => 'required|max:50',
    ];

    protected $messages = [
        'lesson.title.required' => 'Este campo es obligatorio',
        'lesson.title.max' => 'Este campo no puede tener más de 50 caracteres',
    ];

    public function mount(Pensum $pensum){
        $this->pensum = $pensum;
        $this->lesson = new Lesson();
    }

    public function render()
    {
        $lessons = Lesson::where('pensum_id', $this->pensum->id)->get();
        return view('livewire.lessons.lessons-index', compact('lessons'));
    }

    public function edit(Lesson $lesson){
        if($lesson){
            $this->lesson = $lesson;
        }
        else{
            $this->lesson = new Lesson();
        }
    }

    public function update(){

        $this->validate();

        $this->lesson->save();
        $this->lesson = new Lesson();

        $this->pensum = Pensum::find($this->pensum->id);

    }

    public function destroy(Lesson $lesson){
        $lesson->delete();
        $this->emitTo('lessons.lessons-index', 'render');
        $this->emit('alert', 'success', '¡La lección fue eliminada exitosamente!');
    }

    
}
