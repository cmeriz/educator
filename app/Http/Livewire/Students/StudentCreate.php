<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;

class StudentCreate extends Component
{
    public $open = false;
    public $firstname, $lastname, $course_id;

    protected $rules = [
        'firstname' => 'required|max:50',
        'lastname' => 'required|max:50',
    ];

    protected $messages = [
        'firstname.required' => 'Este campo es obligatorio',
        'firstname.max:50' => 'Este campo no puede tener más de 50 caracteres',
        'lastname.required' => 'Este campo es obligatorio',
        'lastname.max:50' => 'Este campo no puede tener más de 50 caracteres',
    ];

    protected $listeners = [
        'studentCreate' => 'openModal',
    ];

    public function mount($course_id){
        $this->course_id = $course_id;
    }

    public function render()
    {
        return view('livewire.students.student-create');
    }

    public function openModal(){
        $this->open = true;
    }

    public function save(){
        $this->validate();

        Student::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'course_id' => $this->course_id,
        ]);

        $this->reset(['firstname', 'lastname', 'open']);
        $this->emit('alert', 'success', '¡El estudiante fue creado exitosamente!');
        $this->emit('students-table-refresh');

    }

}
