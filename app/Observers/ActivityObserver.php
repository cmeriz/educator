<?php

namespace App\Observers;

use App\Http\Controllers\AverageController;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;

class ActivityObserver
{
    /**
     * Handle the Activity "created" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function created(Activity $activity)
    {

        if(! \App::runningInConsole()){

            $course = Course::firstWhere('id', $activity->course_id);
            $students = Student::where('course_id', $course->id)->get();
    
            if(count($students) == 0){
                return;
            }
    
            foreach ($students as $student) {
                
                Grade::create([
                    'value' => 0,
                    'activity_id' => $activity->id,
                    'student_id' => $student->id,
                ]);
    
            }

            AverageController::updateGradeAvg($course);
        }

    }

    /**
     * Handle the Activity "updated" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function updated(Activity $activity)
    {
        //
    }

    /**
     * Handle the Activity "deleted" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function deleted(Activity $activity)
    {
        //
    }

    /**
     * Handle the Activity "restored" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function restored(Activity $activity)
    {
        //
    }

    /**
     * Handle the Activity "force deleted" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function forceDeleted(Activity $activity)
    {
        //
    }
}
