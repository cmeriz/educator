<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $students = Student::orderBy('id', 'asc')->get();

        foreach ($students as $student) {

            $activities = Activity::where('course_id', $student->course_id)
                                  ->orderBy('id', 'asc')
                                  ->get();

            foreach ($activities as $activity) {
                Grade::create([
                    'value' => rand(0, 10),
                    'activity_id' => $activity->id,
                    'student_id' => $student->id,
                ]);
            }
        }            
    }
}
