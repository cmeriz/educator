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
        // When not in console
        if(! \App::runningInConsole()){

            // Creating grades in all activities for created student
            foreach ($student->course->activities as $activity) {
                Grade::create([
                    'value' => 0,
                    'activity_id' => $activity->id,
                    'student_id' => $student->id,
                ]);
            }

            // Creating attendances in all classdays for created student
            foreach ($student->course->classdays as $classday) {
                Attendance::create([
                    'attended' => false,
                    'classday_id' => $classday->id,
                    'student_id' => $student->id,
                ]);
            }

            // Creating grade and attendance average for created student
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

}
