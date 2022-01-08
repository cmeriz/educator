<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Attendance;
use App\Models\Classday;
use App\Models\Student;

class ClassdayObserver
{
    /**
     * Handle the Classday "created" event.
     *
     * @param  \App\Models\Classday  $classday
     * @return void
     */
    public function created(Classday $classday)
    {
        // When not in console
        if(! \App::runningInConsole()){

            // Getting course and students related to classday
            $course = $classday->course;
            $students = Student::where('course_id', $course->id)->get();
            
            // When no student is found, return
            if(count($students) == 0){
                return;
            }
            
            // Creating attendance for all students in created classday 
            foreach ($students as $student) {
                Attendance::create([
                    'attended' => false,
                    'classday_id' => $classday->id,
                    'student_id' => $student->id,
                ]);
            }

            // Updating student's attendance average
            AverageController::updateAttendanceAvg($course);
            
        }
    }

    public function deleted(Classday $classday)
    {
        // Updating course's students attendance average
        AverageController::updateAttendanceAvg($classday->course);
    }

}
