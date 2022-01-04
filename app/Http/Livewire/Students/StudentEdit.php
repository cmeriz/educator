<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;

class StudentEdit extends Component
{

    public $open = false;
    public $firstname, $lastname, $student;

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
        'studentEdit' => 'editing',
    ];

    public function mount(){
        $this->student = new Student();
    }

    public function render()
    {
        return view('livewire.students.student-edit');
    }

    public function editing(Student $student){
        $this->open = true;
        $this->student = $student;
        $this->firstname = $this->student->firstname;
        $this->lastname = $this->student->lastname;
    }

    public function update(){
        $this->validate();

        $this->student->firstname = $this->firstname;
        $this->student->lastname = $this->lastname;
        $this->student->save();

        $this->student = new Student();
        $this->reset(['firstname', 'lastname', 'open']);
        $this->emit('alert', 'success', '¡El estudiante fue actualizado exitosamente!');
        $this->emitTo('grades.grades-index', 'render');

    }

}