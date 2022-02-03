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
            'title' => 'Lección de Prueba 1',
            'pensum_id' => 1,
        ]);

        Lesson::create([
            'title' => 'Lección de Prueba 2',
            'pensum_id' => 1,
        ]);

        Lesson::create([
            'title' => 'Lección de Prueba 3',
            'pensum_id' => 1,
        ]);

        Lesson::create([
            'title' => 'Diagramas de Flujo',
            'pensum_id' => 2,
        ]);

        Lesson::create([
            'title' => 'Tipos de Variables',
            'pensum_id' => 2,
        ]);

        Lesson::create([
            'title' => 'Estructuras de Control',
            'pensum_id' => 2,
        ]);

        Lesson::create([
            'title' => 'Tipos de datos',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'title' => 'Estructuras estáticas',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'title' => 'Operaciones con Arreglos',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'title' => 'Matriz poco densa',
            'pensum_id' => 3,
        ]);

        Lesson::create([
            'title' => 'Listas, Pilas y Colas',
            'pensum_id' => 3,
        ]);

        

    }
}
