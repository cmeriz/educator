<?php

namespace Database\Seeders;

use App\Models\Activity;
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
        Activity::create([
            'activity_type_id' => 1,
            'course_id' => 1,
        ]);

        Activity::create([
            'activity_type_id' => 1,
            'course_id' => 1,
        ]);

        Activity::create([
            'activity_type_id' => 2,
            'course_id' => 1,
        ]);
        
        Activity::create([
            'activity_type_id' => 2,
            'course_id' => 1,
        ]);

        Activity::create([
            'activity_type_id' => 3,
            'course_id' => 1,
        ]);
        
        Activity::create([
            'activity_type_id' => 3,
            'course_id' => 1,
        ]);
    }
}
