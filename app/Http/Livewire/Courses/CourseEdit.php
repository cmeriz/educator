<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\Pensum;
use Livewire\Component;

class CourseEdit extends Component
{

    public $course_id, $name, $color, $pensum_name, $pensum_id;
    public $open = false;

    protected $rules = [
        'name' => 'required|max:50',
        'color' => 'required',
        'pensum_id' => 'required',
    ];

    protected $messages = [
        'course.name.required' => 'Este campo es obligatorio',
        'course.name.max' => 'Este campo no puede tener más de 50 caracteres',
        'course.color.required' => 'Este campo es obligatorio',
        'course.pensum.required' => 'Este campo es obligatorio',
    ];

    public function mount($course_id, $name, $color, $pensum_id){
        $this->course_id = $course_id;
        $this->name = $name;
        $this->color = $color;
        $this->pensum_id = $pensum_id;
        $this->pensum_name = Pensum::find($this->pensum_id)->name;
    }

    public function render()
    {
        $pensums = Pensum::where('user_id', auth()->user()->id)->get();

        return view('livewire.courses.course-edit', compact('pensums'));
    }

    public function update(){

        $this->validate();

        $course = Course::find($this->course_id);
        $course->name = $this->name;
        $course->color = $this->color;
        $course->pensum_id = $this->pensum_id;

        $course->save();

        $this->reset(['open']);

        $this->emitTo('courses.courses-index', 'render');
        $this->emit('alert', 'success', '¡El curso fue creado exitosamente!');

    }
}
