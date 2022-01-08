<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Attendance;
use App\Models\Average;

class AttendanceObserver
{
    public function updated(Attendance $attendance)
    {
        // Getting attendance's student
        $student = $attendance->student;

        // Updating current student's attendance average
        AverageController::updateAttendanceAvg(null, $student);       
    }
}
