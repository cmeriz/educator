<?php

namespace App\Http\Livewire\Classdays;

use App\Models\Classday;
use Illuminate\Validation\Validator;
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

        // Validating request
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {

                // Finding classday with same date
                $repeated = Classday::firstWhere('date', $this->date);

                // Throwing error when classday repated is found
                if($repeated){
                    $validator->errors()->add('repeated', 'Ya existe una clase en esa fecha');
                }
            });
        })->validate();

        // Creating new course
        Classday::create([
            'date' => $this->date,
            'course_id' => $this->course_id,
        ]);

        // Resetting component & showing results
        $this->reset(['open', 'date']);
        $this->emit('students-table-refresh');
        $this->emit('alert', 'success', '¡La clase fue creada exitosamente!');

    }

}
