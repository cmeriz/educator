<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ActivityTypeSeeder::class);
        $this->call(PensumSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(EventSeeder::class);
    }
}
