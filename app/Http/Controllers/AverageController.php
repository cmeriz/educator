<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Attendance;
use App\Models\Average;
use App\Models\Classday;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class AverageController extends Controller
{
    // Update Student(s) Grade Average
    public static function updateGradeAvg(Course $course, $student = null){

        // Building Array
        $students = [$student];
        
        // When no student is recieved, filling array with all students in course
        if($students[0] == null){
            $students = Student::where('course_id', $course->id)->get();
        }

        // Getting all course activities by type
        $homeworks = Activity::where('course_id', $course->id)
                                  ->where('activity_type_id', ActivityType::HOMEWORK)
                                  ->get();
        $lessons = Activity::where('course_id', $course->id)
                                  ->where('activity_type_id', ActivityType::LESSON)
                                  ->get();
        $exams = Activity::where('course_id', $course->id)
                                  ->where('activity_type_id', ActivityType::EXAM)
                                  ->get();

        // Iterating all students (including when just one)
        foreach ($students as $student) {

            // Initializing variables
            $homeworks_average = $lessons_average = $exams_average = 0;

            // Calculating activities average according to corresponding weight 
            if(count($homeworks) > 0){
                $homeworks_average = AverageController::calcActivitiesAverage($homeworks, $student, $course->homeworks_weight);
            }
            
            if(count($lessons) > 0){
                $lessons_average = AverageController::calcActivitiesAverage($lessons, $student, $course->lessons_weight);
            }
            
            if(count($exams) > 0){
                $exams_average = AverageController::calcActivitiesAverage($exams, $student, $course->exams_weight);
            }

            // Getting current student's average
            $average = Average::where('student_id', $student->id)
                            ->where('type', Average::TYPES[0])
                            ->first();
            
            // Updating current average      
            $average->value = $homeworks_average + $lessons_average + $exams_average;
            $average->save();  
        }

    }

    private static function calcActivitiesAverage($activities, $student, $weight){
        
        // Initializing average
        $activities_average = 0;

        // Acumulating all activities grades
        foreach ($activities as $activity) {
            $currentGrade = $student->getActivityGrade($activity->id)->value;
            $activities_average += $currentGrade;
        }

        // Dividing average by activities count
        $activities_average /= count($activities);

        // Weighting Average
        $activities_average *= ($weight / 100);

        return $activities_average;
    }

    // Update Student(s) Attendance Average
    public static function updateAttendanceAvg($course = null, $student = null){

        // Initializing students array
        $students = [];

        // Filling array with student recieved if that's the case
        if(!$course){
            $students = [$student];
        }

        // Filling array with all students when course recieved
        if(!$student){
            $students = Student::where('course_id', $course->id)->get();
        }
        
        // Iterating students array
        foreach ($students as $student) {
            
            // Student's attendances count
            $attendances_count = Attendance::where('student_id', $student->id)->count();

            // Student's attended classes count
            $attended_count = Attendance::where('student_id', $student->id)
                                        ->where('attended', 1)
                                        ->count();

            // Calculating average
            $attendances_average = ($attended_count * 100) / $attendances_count;

            // Getting current student's average
            $average = Average::where('student_id', $student->id)
                                ->where('type', Average::TYPES[1])
                                ->first();

            // Updating current average
            $average->value = $attendances_average;
            $average->save();  
        }

    }

}
