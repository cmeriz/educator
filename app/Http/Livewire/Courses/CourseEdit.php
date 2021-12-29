<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\Pensum;
use Livewire\Component;

class CourseEdit extends Component
{

    public $course, $name, $color, $pensum_id;
    public $open = false;

    protected $rules = [
        'name' => 'required|max:50',
        'color' => 'required',
        'pensum_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Este campo es obligatorio',
        'name.max' => 'Este campo no puede tener más de 50 caracteres',
        'color.required' => 'Este campo es obligatorio',
        'pensum_id.required' => 'Este campo es obligatorio',
    ];

    protected $listeners = [
        'courseEdit' => 'editing',
    ];

    public function mount(){
        $this->course = new Course();
    }

    public function render()
    {
        $pensums = Pensum::where('user_id', auth()->user()->id)->get();

        return view('livewire.courses.course-edit', compact('pensums'));
    }

    public function editing(Course $course){
        $this->course = $course;
        $this->name = $this->course->name;
        $this->color = $this->course->color;
        $this->pensum_id = $this->course->pensum_id;
        $this->open = true;
    }

    public function update(){

        $this->validate();

        $this->course->name = $this->name;
        $this->course->color = $this->color;
        $this->course->pensum_id = $this->pensum_id;

        $this->course->save();

        $this->reset(['open', 'course', 'name', 'color', 'pensum_id']);

        $this->emitTo('courses.courses-index', 'render');
        $this->emit('alert', 'success', '¡El curso fue actualizado exitosamente!');

    }
}
