<?php

namespace Database\Seeders;

use App\Models\Grade;
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

        // Student 1

        Grade::create([
            'value' => 6,
            'activity_id' => 1,
            'student_id' => 1,
        ]);

        Grade::create([
            'value' => 9,
            'activity_id' => 2,
            'student_id' => 1,
        ]);

        Grade::create([
            'value' => 7,
            'activity_id' => 3,
            'student_id' => 1,
        ]);

        Grade::create([
            'value' => 8,
            'activity_id' => 4,
            'student_id' => 1,
        ]);

        Grade::create([
            'value' => 7,
            'activity_id' => 5,
            'student_id' => 1,
        ]);

        Grade::create([
            'value' => 8,
            'activity_id' => 6,
            'student_id' => 1,
        ]);

        // Student 2

        Grade::create([
            'value' => 7,
            'activity_id' => 1,
            'student_id' => 2,
        ]);

        Grade::create([
            'value' => 5,
            'activity_id' => 2,
            'student_id' => 2,
        ]);

        Grade::create([
            'value' => 9,
            'activity_id' => 3,
            'student_id' => 2,
        ]);

        Grade::create([
            'value' => 4,
            'activity_id' => 4,
            'student_id' => 2,
        ]);

        Grade::create([
            'value' => 3,
            'activity_id' => 5,
            'student_id' => 2,
        ]);

        Grade::create([
            'value' => 5,
            'activity_id' => 6,
            'student_id' => 2,
        ]);

        // Student 3

        Grade::create([
            'value' => 6,
            'activity_id' => 1,
            'student_id' => 3,
        ]);

        Grade::create([
            'value' => 8,
            'activity_id' => 2,
            'student_id' => 3,
        ]);

        Grade::create([
            'value' => 9,
            'activity_id' => 3,
            'student_id' => 3,
        ]);

        Grade::create([
            'value' => 4,
            'activity_id' => 4,
            'student_id' => 3,
        ]);

        Grade::create([
            'value' => 5,
            'activity_id' => 5,
            'student_id' => 3,
        ]);

        Grade::create([
            'value' => 1,
            'activity_id' => 6,
            'student_id' => 3,
        ]);

        // Student 4

        Grade::create([
            'value' => 8,
            'activity_id' => 1,
            'student_id' => 4,
        ]);

        Grade::create([
            'value' => 9,
            'activity_id' => 2,
            'student_id' => 4,
        ]);

        Grade::create([
            'value' => 7,
            'activity_id' => 3,
            'student_id' => 4,
        ]);

        Grade::create([
            'value' => 6,
            'activity_id' => 4,
            'student_id' => 4,
        ]);

        Grade::create([
            'value' => 2,
            'activity_id' => 5,
            'student_id' => 4,
        ]);

        Grade::create([
            'value' => 4,
            'activity_id' => 6,
            'student_id' => 4,
        ]);
        
    }
}
