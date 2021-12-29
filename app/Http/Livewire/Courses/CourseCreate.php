<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\Pensum;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $open = false;
    public $color = null;
    public $pensum_id = null;

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

    public function render()
    {
        $pensums = Pensum::where('user_id', auth()->user()->id)->get();

        return view('livewire.courses.course-create', compact('pensums'));
    }

    public function save(){

        $this->validate();

        Course::create([
            'name' => $this->name,
            'color' => $this->color,
            'user_id' => auth()->user()->id,
            'pensum_id' => $this->pensum_id,
        ]);

        $this->reset(['open', 'name', 'color', 'pensum_id']);
        $this->emitTo('courses.courses-index', 'render');
        $this->emit('alert', 'success', '¡El curso fue creado exitosamente!');

    }

}
