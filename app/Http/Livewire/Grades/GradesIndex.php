<?php

namespace App\Http\Livewire\Grades;

use App\Http\Controllers\ActivityController;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class GradesIndex extends Component
{
    use WithPagination;

    public $search, $course, $homeworks, $lessons, $exams, $grade;
    public $type_filter = 'all';

    protected $rules = [
        'grade.value' => 'required|gte:0|lte:10',
    ];

    protected $messages = [
        'grade.value.required' => 'Este campo es obligatorio',
        'grade.value.gte' => 'Las calificaciones son mínimo de 0pts',
        'grade.value.lte' => 'Las calificaciones son máximo de 10pts',
    ];

    protected $listeners = [
        'students-table-refresh' => 'render',
        'deleteStudent',
        'deleteActivity',
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->grade = new Grade();
    }

    public function render()
    {
        // Getting all activities by type
        $this->homeworks = Activity::where('course_id', $this->course->id)
                ->where('activity_type_id', ActivityType::HOMEWORK)
                ->get();
        $this->lessons = Activity::where('course_id', $this->course->id)
                ->where('activity_type_id', ActivityType::LESSON)
                ->get();
        $this->exams = Activity::where('course_id', $this->course->id)
                ->where('activity_type_id', ActivityType::EXAM)
                ->get();
        
        // Getting all students in current course, filtered and ordered by lastname
        $students = Student::where('course_id', $this->course->id)
                           ->where(function($query){
                               $query->where('firstname', 'LIKE', '%' . $this->search . '%')
                                     ->orWhere('lastname', 'LIKE', '%' . $this->search . '%');
                           })
                           ->orderBy('lastname')
                           ->paginate(6);
                           
        return view('livewire.grades.grades-index', compact('students'));
    }

    public function edit(Grade $grade){
        // Updating grade property to show editing form in view
        $this->grade = $grade;
    }

    public function update(){

        // Validating request
        $this->validate();

        // Updating grade
        $this->grade->save();

        // Resetting component & showing results
        $this->grade = new Grade();
        $this->reset(['search', 'type_filter']);
        $this->emit('alert', 'success', '¡La calificación fue actualizada exitosamente!');
        $this->emitSelf('render');
    }

    public function updatingSearch(){
        // If search is updated, refresh page to prevent missing results for valid searchings
        $this->resetPage();
    }

    public function createActivity($activity_type){

        // Creating new activity
        Activity::create([
            'activity_type_id' => $activity_type,
            'course_id' => $this->course->id,
        ]);

        // Resetting component & showing results
        $this->emit('alert', 'success', '¡La actividad fue creada exitosamente!');
        $this->emitSelf('render');
    }

    public function deleteActivity(Activity $activity){
        $activity->delete();
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡La actividad fue borrada exitosamente!');
    }

    public function deleteStudent(Student $student){
        $student->delete();
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El estudiante fue borrado exitosamente!');
    }
}
