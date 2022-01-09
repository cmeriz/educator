<?php

namespace App\Http\Livewire\Lessons;

use App\Models\Lesson;
use App\Models\Pensum;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LessonsIndex extends Component
{

    use AuthorizesRequests;

    public $pensum, $lesson;

    protected $listeners = [
        'lessonDelete' => 'destroy',
        'render'
    ];

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
        // Getting all current pensum's lessons
        $lessons = Lesson::where('pensum_id', $this->pensum->id)->get();
        return view('livewire.lessons.lessons-index', compact('lessons'));
    }

    public function edit(Lesson $lesson){
        // Verifying if user is lesson's owner
        $this->authorize('owner', $lesson);

        // Setting lesson property to show editing form in view
        $this->lesson = $lesson;
        $this->emit('focus', '#input-lesson');
    }

    public function cancelEdit(){
        // When canceling, reinitializing lesson property to delete form in view
        $this->lesson = new Lesson();
    }

    public function update(){

        // Verifying if user is lesson's owner
        $this->authorize('owner', $this->lesson);

        // Validating request
        $this->validate();

        // Updating lesson
        $this->lesson->save();
        
        // Resetting component properties
        $this->lesson = new Lesson();
        $this->pensum = Pensum::find($this->pensum->id);

    }

    public function destroy(Lesson $lesson){

        // Verifying if user is lesson's owner
        $this->authorize('owner', $lesson);
        
        // Destroying lesson register
        $lesson->delete();
        
        // Resetting component & showing results
        $this->emitTo('lessons.lessons-index', 'render');
        $this->emit('alert', 'success', '¡La lección fue eliminada exitosamente!');
    }

    
}
