<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Course;

class CourseObserver
{

    public function updated(Course $course)
    {
        // Updating course's students grade average
        AverageController::updateGradeAvg($course);

        // Deleting courses/lessons intermediate table registers when new pensum is null
        // Pensum progress will be resetted
        if(!$course->pensum){
            $course->lessons()->detach();
        }

    }

}
