<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Average;
use App\Models\Grade;

class GradeObserver
{

    public function created(Grade $grade)
    {
        //
    }

    public function updated(Grade $grade)
    {
        $course = $grade->student->course;
        $student = $grade->student;

        AverageController::updateGradeAvg($course, $student); 

    }

    public function deleted(Grade $grade)
    {
        //
    }

    public function restored(Grade $grade)
    {
        //
    }

    public function forceDeleted(Grade $grade)
    {
        //
    }

}
