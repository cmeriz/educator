<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Average;
use App\Models\Grade;

class GradeObserver
{
    
    public function updated(Grade $grade)
    {
        // Getting course and student related to grade
        $course = $grade->student->course;
        $student = $grade->student;

        // Updating student's grade average
        AverageController::updateGradeAvg($course, $student); 

    }

}
