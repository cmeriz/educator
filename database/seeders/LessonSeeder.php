<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Lesson::create([
            'name' => 'FP_Lesson1',
            'pensum_id' => 1,
        ]);

        Lesson::create([
            'name' => 'FP_Lesson2',
            'pensum_id' => 1,
        ]);

        Lesson::create([
            'name' => 'ED_Lesson1',
            'pensum_id' => 2,
        ]);

        Lesson::create([
            'name' => 'ED_Lesson2',
            'pensum_id' => 2,
        ]);

        Lesson::create([
            'name' => 'SO_Lesson1',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'name' => 'SO_Lesson2',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'name' => 'PS_Lesson1',
            'pensum_id' => 4,
        ]);

        Lesson::create([
            'name' => 'PS_Lesson2',
            'pensum_id' => 4,
        ]);

        Lesson::create([
            'name' => 'AC_Lesson1',
            'pensum_id' => 5,
        ]);

        Lesson::create([
            'name' => 'AC_Lesson2',
            'pensum_id' => 5,
        ]);

        Lesson::create([
            'name' => 'MC_Lesson1',
            'pensum_id' => 6,
        ]);

        Lesson::create([
            'name' => 'MC_Lesson2',
            'pensum_id' => 6,
        ]);

        Lesson::create([
            'name' => 'MD_Lesson1',
            'pensum_id' => 7,
        ]);

        Lesson::create([
            'name' => 'MD_Lesson2',
            'pensum_id' => 7,
        ]);

        Lesson::create([
            'name' => 'AL_Lesson1',
            'pensum_id' => 8,
        ]);

        Lesson::create([
            'name' => 'AL_Lesson2',
            'pensum_id' => 8,
        ]);

        Lesson::create([
            'name' => 'CI_Lesson1',
            'pensum_id' => 9,
        ]);

        Lesson::create([
            'name' => 'CI_Lesson2',
            'pensum_id' => 9,
        ]);

        Lesson::create([
            'name' => 'MI_Lesson1',
            'pensum_id' => 10,
        ]);

        Lesson::create([
            'name' => 'MI_Lesson2',
            'pensum_id' => 10,
        ]);

    }
}
