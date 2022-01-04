<?php

namespace Database\Seeders;

use App\Models\Average;
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
        Average::create([
            'value' => 0,
            'type' => Average::TYPES[0],
            'student_id' => 1,
        ]);

        Average::create([
            'value' => 0,
            'type' => Average::TYPES[0],
            'student_id' => 2,
        ]);

        Average::create([
            'value' => 0,
            'type' => Average::TYPES[0],
            'student_id' => 3,
        ]);
        
        Average::create([
            'value' => 0,
            'type' => Average::TYPES[0],
            'student_id' => 4,
        ]);
    }
}
