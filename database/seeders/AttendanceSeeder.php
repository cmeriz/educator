<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Classday;
use App\Models\Student;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
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

            $classdays = Classday::orderBy('id', 'asc')
                                 ->where('course_id', $student->course_id)
                                 ->get();

            foreach ($classdays as $classday) {
                Attendance::create([
                    'attended' => false,
                    'classday_id' => $classday->id,
                    'student_id' => $student->id,
                ]);
            }
        }

    }
}
