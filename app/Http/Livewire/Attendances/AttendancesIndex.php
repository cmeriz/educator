<?php

namespace App\Http\Livewire\Attendances;

use App\Models\Attendance;
use App\Models\Classday;
use App\Models\Course;
use App\Models\Student;
use Livewire\Component;

class AttendancesIndex extends Component
{

    public $course, $search;

    public function mount(Course $course){
        $this->course = $course;
    }

    protected $listeners = [
        'students-table-refresh' => 'render',
        'deleteClassday',
        'deleteStudent',
    ];

    public function render()
    {
        $students = Student::where('course_id', $this->course->id)
                           ->where(function($query){
                               $query->where('firstname', 'LIKE', '%' . $this->search . '%')
                                   ->orWhere('lastname', 'LIKE', '%' . $this->search . '%');
                           })
                           ->orderBy('lastname')
                           ->get();

        $classdays = Classday::where('course_id', $this->course->id)
                             ->orderBy('date')
                             ->get();

        return view('livewire.attendances.attendances-index', compact('students', 'classdays'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function update(Attendance $attendance, $attended){
        $attendance->attended = $attended;
        $attendance->save();

        $this->emitSelf('render');
    }
    
    public function deleteClassday(Classday $classday){
        $classday->delete();
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡La clase fue borrada exitosamente!');
    }

    public function deleteStudent(Student $student){
        $student->delete();
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El estudiante fue borrado exitosamente!');
    }

}
