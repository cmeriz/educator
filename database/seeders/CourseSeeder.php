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
            'name' => 'Fundamentos de Programación',
            'color' => 'primary',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 1,
        ]);

        Course::create([
            'name' => 'Estructura de Datos',
            'color' => 'blue',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 2,
        ]);

        Course::create([
            'name' => 'Sistemas Operativos',
            'color' => 'red',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 3,
        ]);

        Course::create([
            'name' => 'Programación de Sistemas',
            'color' => 'blue',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 4,
        ]);

        Course::create([
            'name' => 'Arquitectura del Computador',
            'color' => 'orange',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 5,
        ]);

        Course::create([
            'name' => 'Microcontroladores 1',
            'color' => 'purple',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 6,
        ]);

        Course::create([
            'name' => 'Matemáticas Discretas',
            'color' => 'pink',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 7,
        ]);

        Course::create([
            'name' => 'Algebra Lineal',
            'color' => 'primary',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 8,
        ]);

        Course::create([
            'name' => 'Cálculo Integral',
            'color' => 'blue',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 9,
        ]);

        Course::create([
            'name' => 'Metodología de la Investigación',
            'color' => 'red',
            'homeworks_weight' => 40,
            'lessons_weight' => 30,
            'exams_weight' => 30,
            'min_grade' => 7,
            'min_attendance' => 70,
            'user_id' => 1,
            'pensum_id' => 10,
        ]);

    }
}
