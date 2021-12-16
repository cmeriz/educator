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
            'user_id' => 1,
            'pensum_id' => 1,
        ]);

        Course::create([
            'name' => 'Estructura de Datos',
            'user_id' => 1,
            'pensum_id' => 2,
        ]);

        Course::create([
            'name' => 'Sistemas Operativos',
            'user_id' => 2,
            'pensum_id' => 3,
        ]);

        Course::create([
            'name' => 'Programación de Sistemas',
            'user_id' => 2,
            'pensum_id' => 4,
        ]);

        Course::create([
            'name' => 'Arquitectura del Computador',
            'user_id' => 3,
            'pensum_id' => 5,
        ]);

        Course::create([
            'name' => 'Microcontroladores 1',
            'user_id' => 3,
            'pensum_id' => 6,
        ]);

        Course::create([
            'name' => 'Matemáticas Discretas',
            'user_id' => 4,
            'pensum_id' => 7,
        ]);

        Course::create([
            'name' => 'Algebra Lineal',
            'user_id' => 4,
            'pensum_id' => 8,
        ]);

        Course::create([
            'name' => 'Cálculo Integral',
            'user_id' => 5,
            'pensum_id' => 9,
        ]);

        Course::create([
            'name' => 'Metodología de la Investigación',
            'user_id' => 5,
            'pensum_id' => 10,
        ]);

    }
}
