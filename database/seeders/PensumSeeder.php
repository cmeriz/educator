<?php

namespace Database\Seeders;

use App\Models\Pensum;
use Illuminate\Database\Seeder;

class PensumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pensum::create([
            'name' => 'Fundamentos de Programación',
            'user_id' => 1,
        ]);

        Pensum::create([
            'name' => 'Estructura de Datos',
            'user_id' => 1,
        ]);

        Pensum::create([
            'name' => 'Sistemas Operativos',
            'user_id' => 2,
        ]);

        Pensum::create([
            'name' => 'Programación de Sistemas',
            'user_id' => 2,
        ]);

        Pensum::create([
            'name' => 'Arquitectura del Computador',
            'user_id' => 3,
        ]);

        Pensum::create([
            'name' => 'Microcontroladores 1',
            'user_id' => 3,
        ]);

        Pensum::create([
            'name' => 'Matemáticas Discretas',
            'user_id' => 4,
        ]);

        Pensum::create([
            'name' => 'Algebra Lineal',
            'user_id' => 4,
        ]);

        Pensum::create([
            'name' => 'Cálculo Integral',
            'user_id' => 5,
        ]);

        Pensum::create([
            'name' => 'Metodología de la Investigación',
            'user_id' => 5,
        ]);
    }
}
