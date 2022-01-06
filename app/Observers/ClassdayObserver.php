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
        
        if(! \App::runningInConsole()){
            $students = Student::where('course_id', $classday->course->id)->get();
            $course = $classday->course;

            foreach ($students as $student) {
                Attendance::create([
                    'attended' => false,
                    'classday_id' => $classday->id,
                    'student_id' => $student->id,
                ]);
            }

            AverageController::updateAttendanceAvg($course);
            
        }
    }

    /**
     * Handle the Classday "updated" event.
     *
     * @param  \App\Models\Classday  $classday
     * @return void
     */
    public function updated(Classday $classday)
    {
        
    }

    /**
     * Handle the Classday "deleted" event.
     *
     * @param  \App\Models\Classday  $classday
     * @return void
     */
    public function deleted(Classday $classday)
    {
        AverageController::updateAttendanceAvg($classday->course);
    }

    /**
     * Handle the Classday "restored" event.
     *
     * @param  \App\Models\Classday  $classday
     * @return void
     */
    public function restored(Classday $classday)
    {
        //
    }

    /**
     * Handle the Classday "force deleted" event.
     *
     * @param  \App\Models\Classday  $classday
     * @return void
     */
    public function forceDeleted(Classday $classday)
    {
        //
    }

}
