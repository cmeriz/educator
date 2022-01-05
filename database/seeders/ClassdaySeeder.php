<?php

namespace Database\Seeders;

use App\Models\Classday;
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
        Classday::create([
            'date' => '2022-01-05',
            'course_id' => 1,
        ]);

        Classday::create([
            'date' => '2022-01-13',
            'course_id' => 1,
        ]);
    }
}
