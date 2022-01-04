<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\Pensum;
use Illuminate\Validation\Validator;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $open = false;
    public $color = null;
    public $pensum_id = null;
    public $homeworks_weight = 40;
    public $lessons_weight = 30;
    public $exams_weight = 30;
    public $min_grade = 7;
    public $min_attendance = 70;

    protected $rules = [
        'name' => 'required|max:50',
        'color' => 'required',
        'pensum_id' => 'required',
        'homeworks_weight' => 'required|numeric|min:0|max:100',
        'lessons_weight' => 'required|numeric|min:0|max:100',
        'exams_weight' => 'required|numeric|min:0|max:100',
        'min_grade' => 'required|numeric|min:0|max:10',
        'min_attendance' => 'required|numeric|min:0|max:100',
    ];

    protected $messages = [
        'name.required' => 'Este campo es obligatorio',
        'name.max' => 'Este campo no puede tener más de 50 caracteres',
        'color.required' => 'Este campo es obligatorio',
        'pensum_id.required' => 'Este campo es obligatorio',
        'homeworks_weight.required' => 'Este campo es obligatorio',
        'homeworks_weight.numeric' => 'Este campo debe ser un número',
        'homeworks_weight.min' => 'El valor debe estar entre 0 y 100',
        'homeworks_weight.max' => 'El valor debe estar entre 0 y 100',
        'lessons_weight.required' => 'Este campo es obligatorio',
        'lessons_weight.numeric' => 'Este campo debe ser un número',
        'lessons_weight.min' => 'El valor debe estar entre 0 y 100',
        'lessons_weight.max' => 'El valor debe estar entre 0 y 100',
        'exams_weight.required' => 'Este campo es obligatorio',
        'exams_weight.numeric' => 'Este campo debe ser un número',
        'exams_weight.min' => 'El valor debe estar entre 0 y 100',
        'exams_weight.max' => 'El valor debe estar entre 0 y 100',
        'min_grade.required' => 'Este campo es obligatorio',
        'min_grade.numeric' => 'Este campo debe ser un número',
        'min_grade.min' => 'El valor debe estar entre 0 y 10',
        'min_grade.max' => 'El valor debe estar entre 0 y 10',
        'min_attendance.required' => 'Este campo es obligatorio',
        'min_attendance.numeric' => 'Este campo debe ser un número',
        'min_attendance.min' => 'El valor debe estar entre 0 y 100',
        'min_attendance.max' => 'El valor debe estar entre 0 y 100',
    ];

    public function render()
    {
        $pensums = Pensum::where('user_id', auth()->user()->id)->get();

        return view('livewire.courses.course-create', compact('pensums'));
    }

    public function save(){

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (!$this->weightingsValidation
                        (
                            intval($this->homeworks_weight), 
                            intval($this->lessons_weight), 
                            intval($this->exams_weight)
                        )
                    ){
                    $validator->errors()->add('weightings', 'La suma de los porcentajes debe ser 100');
                }
            });
        })->validate();

        Course::create([
            'name' => $this->name,
            'color' => $this->color,
            'user_id' => auth()->user()->id,
            'pensum_id' => $this->pensum_id,
            'homeworks_weight' => $this->homeworks_weight,
            'lessons_weight' => $this->lessons_weight,
            'exams_weight' => $this->exams_weight,
            'min_grade' => $this->min_grade,
            'min_attendance' => $this->min_attendance,
        ]);

        $this->reset([
            'open', 
            'name', 
            'color', 
            'pensum_id', 
            'homeworks_weight', 
            'lessons_weight', 
            'exams_weight', 
            'min_grade',
            'min_attendance',
        ]);

        $this->emitTo('courses.courses-index', 'render');
        $this->emit('alert', 'success', '¡El curso fue creado exitosamente!');

    }

    private static function weightingsValidation($weight1, $weight2, $weight3){

        $result = false;

        if(($weight1 + $weight2 + $weight3) == 100){
            $result = true;
        }

        return $result;
    }

}
