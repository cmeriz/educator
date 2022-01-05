<?php

namespace Database\Seeders;

use App\Models\Attendance;
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
        
        Attendance::create([
            'attended' => 1,
            'classday_id' => 1,
            'student_id' => 1,
        ]);

        Attendance::create([
            'attended' => 1,
            'classday_id' => 1,
            'student_id' => 2,
        ]);
        
        Attendance::create([
            'attended' => 0,
            'classday_id' => 1,
            'student_id' => 3,
        ]);

        Attendance::create([
            'attended' => 0,
            'classday_id' => 1,
            'student_id' => 4,
        ]);

        Attendance::create([
            'attended' => 1,
            'classday_id' => 2,
            'student_id' => 1,
        ]);

        Attendance::create([
            'attended' => 1,
            'classday_id' => 2,
            'student_id' => 2,
        ]);
        
        Attendance::create([
            'attended' => 0,
            'classday_id' => 2,
            'student_id' => 3,
        ]);

        Attendance::create([
            'attended' => 0,
            'classday_id' => 2,
            'student_id' => 4,
        ]);

    }
}
