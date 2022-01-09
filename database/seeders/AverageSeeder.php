<?php

namespace Database\Seeders;

use App\Models\Average;
use App\Models\Student;
use Illuminate\Database\Seeder;

class AverageSeeder extends Seeder
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
            
            Average::create([
                'value' => 0,
                'type' => 'grade',
                'student_id' => $student->id,
            ]);

            Average::create([
                'value' => 0,
                'type' => 'attendance',
                'student_id' => $student->id,
            ]);

        }

    }
}
