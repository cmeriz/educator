<?php

namespace App\Http\Livewire\Courses;

use App\Http\Controllers\CourseController;
use App\Models\Course;
use App\Models\Pensum;
use Illuminate\Validation\Validator;
use Livewire\Component;

class CourseEdit extends Component
{
    public $course, $name, $color, $pensum_id, 
           $homeworks_weight, $lessons_weight, $exams_weight, 
           $min_grade, $min_attendance;

    public $open = false;

    protected $rules = [
        'name' => 'required|max:50',
        'color' => 'required',
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
        $this->homeworks_weight = $this->course->homeworks_weight;
        $this->lessons_weight = $this->course->lessons_weight;
        $this->exams_weight = $this->course->exams_weight;
        $this->min_grade = $this->course->min_grade;
        $this->min_attendance = $this->course->min_attendance;
        $this->open = true;
    }

    public function update(){

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (!CourseController::weightingsValidation
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

        $this->course->name = $this->name;
        $this->course->color = $this->color;
        $this->course->pensum_id = ($this->pensum_id != '') ? $this->pensum_id : null;
        $this->course->homeworks_weight = $this->homeworks_weight;
        $this->course->lessons_weight = $this->lessons_weight;
        $this->course->exams_weight = $this->exams_weight;
        $this->course->min_grade = $this->min_grade;
        $this->course->min_attendance = $this->min_attendance;

        $this->course->save();

        $this->reset([
            'open', 'course', 'name', 'color', 'pensum_id',
            'homeworks_weight', 'lessons_weight', 'exams_weight',
            'min_grade', 'min_attendance']);

        $this->emitTo('courses.courses-index', 'render');
        $this->emit('alert', 'success', '¡El curso fue actualizado exitosamente!');

    }

}
