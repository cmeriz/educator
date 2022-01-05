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
        $this->call(StudentSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(AverageSeeder::class);
        $this->call(ClassdaySeeder::class);
        $this->call(AttendanceSeeder::class);
    }
}
