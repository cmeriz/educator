<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;

class ActivityObserver
{
    public function created(Activity $activity)
    {

        // When not in console
        if(! \App::runningInConsole()){

            // Getting activity's course
            $course = $activity->course;

            // Getting all course's students
            $students = $course->students;
    
            // When no student is found, return
            if(count($students) == 0){
                return;
            }
    
            // Creating grade for all students in created activity
            foreach ($students as $student) {
                
                Grade::create([
                    'value' => 0,
                    'activity_id' => $activity->id,
                    'student_id' => $student->id,
                ]);
    
            }

            // Updating grade average for all students
            AverageController::updateGradeAvg($course);
        }

    }
}
