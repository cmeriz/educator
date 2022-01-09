<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Course;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courses = Course::orderBy('id', 'asc')->get();

        foreach ($courses as $course) {
            for ( $i = 1; $i <= 3 ; $i++ ) { 

                Activity::create([
                    'activity_type_id' => $i,
                    'course_id' => $course->id,
                ]);
                Activity::create([
                    'activity_type_id' => $i,
                    'course_id' => $course->id,
                ]);
                
            }
        }
        
    }
}
