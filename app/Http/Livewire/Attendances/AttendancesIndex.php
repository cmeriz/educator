<?php

namespace App\Http\Livewire\Attendances;

use App\Models\Attendance;
use App\Models\Classday;
use App\Models\Course;
use App\Models\Student;
use Livewire\Component;

class AttendancesIndex extends Component
{
    public $course;

    public function mount(Course $course){
        $this->course = $course;
    }

    protected $listeners = [
        'render',
    ];

    public function render()
    {
        $students = Student::where('course_id', $this->course->id)->get();
        $classdays = Classday::where('course_id', $this->course->id)
                             ->orderBy('date')
                             ->get();

        return view('livewire.attendances.attendances-index', compact('students', 'classdays'));
    }

    public function update(Attendance $attendance, $attended){
        $attendance->attended = $attended;
        $attendance->save();

        $this->emitSelf('render');
    }   

}
