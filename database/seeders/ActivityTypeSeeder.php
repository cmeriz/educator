<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityType::create([
            'name' => 'Homework',
        ]);

        ActivityType::create([
            'name' => 'Lesson',
        ]);

        ActivityType::create([
            'name' => 'Exam',
        ]);
    }
}
