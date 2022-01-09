<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Administración de Sistemas (Paralelo A)',
            'color' => 'red',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 1,
        ]);

        Course::create([
            'name' => 'Administración de Sistemas (Paralelo A)',
            'color' => 'blue',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 1,
        ]);

        Course::create([
            'name' => 'Fundamentos de Programación (Paralelo A)',
            'color' => 'red',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 2,
            'pensum_id' => 2,
        ]);

        Course::create([
            'name' => 'Fundamentos de Programación (Paralelo B)',
            'color' => 'blue',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 2,
            'pensum_id' => 2,
        ]);

        Course::create([
            'name' => 'Estructura de Datos (Paralelo A)',
            'color' => 'orange',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 2,
            'pensum_id' => 3,
        ]);

        Course::create([
            'name' => 'Estructura de Datos (Paralelo B)',
            'color' => 'purple',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 2,
            'pensum_id' => 3,
        ]);

    }
}
