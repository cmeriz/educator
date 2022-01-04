<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Average;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class AverageController extends Controller
{
    public static function updateGradeAvg(Course $course, $student = null){

        $students = [$student];
        
        if($students[0] == null){
            $students = Student::where('course_id', $course->id)->get();
        }

        $homeworks = Activity::where('course_id', $course->id)
                                  ->where('activity_type_id', ActivityType::HOMEWORK)
                                  ->get();
        $lessons = Activity::where('course_id', $course->id)
                                  ->where('activity_type_id', ActivityType::LESSON)
                                  ->get();
        $exams = Activity::where('course_id', $course->id)
                                  ->where('activity_type_id', ActivityType::EXAM)
                                  ->get();

        foreach ($students as $student) {

            $homeworks_average = $lessons_average = $exams_average = 0;

            if(count($homeworks) > 0){
                $homeworks_average = AverageController::calcAverage($homeworks, $student, $course->homeworks_weight);
            }
            
            if(count($lessons) > 0){
                $lessons_average = AverageController::calcAverage($lessons, $student, $course->lessons_weight);
            }
            
            if(count($exams) > 0){
                $exams_average = AverageController::calcAverage($exams, $student, $course->exams_weight);
            }

            $average = Average::where('student_id', $student->id)
                            ->where('type', Average::TYPES[0])
                            ->first();
                            
            $average->value = $homeworks_average + $lessons_average + $exams_average;

            $average->save();  
        }

    }

    private static function calcAverage($activities, $student, $weight){
        
        // Init average
        $activities_average = 0;

        // Acumulate all activities grades
        foreach ($activities as $activity) {
            $currentGrade = $student->getActivityGrade($activity->id)->value;
            $activities_average += $currentGrade;
        }

        // Divide average by activities count
        $activities_average /= count($activities);

        // Weight Activity
        $activities_average *= ($weight / 100);

        return $activities_average;
    }

}
