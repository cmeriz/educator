<?php

namespace Database\Seeders;

use App\Models\Classday;
use App\Models\Course;
use Illuminate\Database\Seeder;

class ClassdaySeeder extends Seeder
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

            Classday::create([
                'date' => '2022-01-01',
                'course_id' => $course->id,
            ]);
            Classday::create([
                'date' => '2022-01-02',
                'course_id' => $course->id,
            ]);
            Classday::create([
                'date' => '2022-01-03',
                'course_id' => $course->id,
            ]);
            Classday::create([
                'date' => '2022-01-04',
                'course_id' => $course->id,
            ]);
            Classday::create([
                'date' => '2022-01-05',
                'course_id' => $course->id,
            ]);
            
        }        
    }
}
