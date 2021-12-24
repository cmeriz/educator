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
            'title' => 'FP_Lesson1',
            'pensum_id' => 1,
        ]);

        Lesson::create([
            'title' => 'FP_Lesson2',
            'pensum_id' => 1,
        ]);

        Lesson::create([
            'title' => 'ED_Lesson1',
            'pensum_id' => 2,
        ]);

        Lesson::create([
            'title' => 'ED_Lesson2',
            'pensum_id' => 2,
        ]);

        Lesson::create([
            'title' => 'SO_Lesson1',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'title' => 'SO_Lesson2',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'title' => 'PS_Lesson1',
            'pensum_id' => 4,
        ]);

        Lesson::create([
            'title' => 'PS_Lesson2',
            'pensum_id' => 4,
        ]);

        Lesson::create([
            'title' => 'AC_Lesson1',
            'pensum_id' => 5,
        ]);

        Lesson::create([
            'title' => 'AC_Lesson2',
            'pensum_id' => 5,
        ]);

        Lesson::create([
            'title' => 'MC_Lesson1',
            'pensum_id' => 6,
        ]);

        Lesson::create([
            'title' => 'MC_Lesson2',
            'pensum_id' => 6,
        ]);

        Lesson::create([
            'title' => 'MD_Lesson1',
            'pensum_id' => 7,
        ]);

        Lesson::create([
            'title' => 'MD_Lesson2',
            'pensum_id' => 7,
        ]);

        Lesson::create([
            'title' => 'AL_Lesson1',
            'pensum_id' => 8,
        ]);

        Lesson::create([
            'title' => 'AL_Lesson2',
            'pensum_id' => 8,
        ]);

        Lesson::create([
            'title' => 'CI_Lesson1',
            'pensum_id' => 9,
        ]);

        Lesson::create([
            'title' => 'CI_Lesson2',
            'pensum_id' => 9,
        ]);

        Lesson::create([
            'title' => 'MI_Lesson1',
            'pensum_id' => 10,
        ]);

        Lesson::create([
            'title' => 'MI_Lesson2',
            'pensum_id' => 10,
        ]);

    }
}
