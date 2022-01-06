<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Attendance;
use App\Models\Average;
use App\Models\Grade;
use App\Models\Student;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function created(Student $student)
    {
        if(! \App::runningInConsole()){
            foreach ($student->course->activities as $activity) {
                Grade::create([
                    'value' => 0,
                    'activity_id' => $activity->id,
                    'student_id' => $student->id,
                ]);
            }

            foreach ($student->course->classdays as $classday) {
                Attendance::create([
                    'attended' => false,
                    'classday_id' => $classday->id,
                    'student_id' => $student->id,
                ]);
            }

            Average::create([
                'value' => 0,
                'type' => Average::TYPES[0],
                'student_id' => $student->id,
            ]);

            Average::create([
                'value' => 0,
                'type' => Average::TYPES[1],
                'student_id' => $student->id,
            ]);

        }        
    }

    /**
     * Handle the Student "updated" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function updated(Student $student)
    {
        //
    }

    /**
     * Handle the Student "deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     *
     * @param  \App\Models\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }
}
