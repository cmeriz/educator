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
            'user_id' => 1,
            'pensum_id' => 1,
        ]);

        Course::create([
            'name' => 'Estructura de Datos',
            'color' => 'blue',
            'user_id' => 1,
            'pensum_id' => 2,
        ]);

        Course::create([
            'name' => 'Sistemas Operativos',
            'color' => 'red',
            'user_id' => 1,
            'pensum_id' => 3,
        ]);

        Course::create([
            'name' => 'Programación de Sistemas',
            'color' => 'blue',
            'user_id' => 1,
            'pensum_id' => 4,
        ]);

        Course::create([
            'name' => 'Arquitectura del Computador',
            'color' => 'orange',
            'user_id' => 1,
            'pensum_id' => 5,
        ]);

        Course::create([
            'name' => 'Microcontroladores 1',
            'color' => 'purple',
            'user_id' => 1,
            'pensum_id' => 6,
        ]);

        Course::create([
            'name' => 'Matemáticas Discretas',
            'color' => 'pink',
            'user_id' => 1,
            'pensum_id' => 7,
        ]);

        Course::create([
            'name' => 'Algebra Lineal',
            'color' => 'primary',
            'user_id' => 1,
            'pensum_id' => 8,
        ]);

        Course::create([
            'name' => 'Cálculo Integral',
            'color' => 'blue',
            'user_id' => 1,
            'pensum_id' => 9,
        ]);

        Course::create([
            'name' => 'Metodología de la Investigación',
            'color' => 'red',
            'user_id' => 1,
            'pensum_id' => 10,
        ]);

    }
}
