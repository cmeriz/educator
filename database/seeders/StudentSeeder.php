<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'firstname' => 'Emily Monserrat',
            'lastname' => 'Moreno Gomez',
            'course_id' => 1
        ]);

        Student::create([
            'firstname' => 'Marlon Ramón',
            'lastname' => 'Barzola Romero',
            'course_id' => 1
        ]);

        Student::create([
            'firstname' => 'Fausto Eduardo',
            'lastname' => 'Gavela Vera',
            'course_id' => 2
        ]);

        Student::create([
            'firstname' => 'Deriam Juliano',
            'lastname' => 'Vallejo Espinoza',
            'course_id' => 2
        ]);

        Student::create([
            'firstname' => 'Victor Alexis',
            'lastname' => 'Barrero Beltrán',
            'course_id' => 3
        ]);

        Student::create([
            'firstname' => 'Emilio Andrés',
            'lastname' => 'Lozano Zabala',
            'course_id' => 3
        ]);

        Student::create([
            'firstname' => 'Juan Carlos',
            'lastname' => 'Vega Mellado',
            'course_id' => 3
        ]);

        Student::create([
            'firstname' => 'Luis Francisco',
            'lastname' => 'Serra Salazar',
            'course_id' => 3
        ]);

        Student::create([
            'firstname' => 'Pedro Miguel',
            'lastname' => 'Cerezo Giraldo',
            'course_id' => 4
        ]);

        Student::create([
            'firstname' => 'Fernando José',
            'lastname' => 'Borja Carballo',
            'course_id' => 4
        ]);

        Student::create([
            'firstname' => 'José Jesús',
            'lastname' => 'Alves Ríos',
            'course_id' => 4
        ]);

        Student::create([
            'firstname' => 'Aaron Alfonso',
            'lastname' => 'Prat Pizarro',
            'course_id' => 4
        ]);

        Student::create([
            'firstname' => 'Felipe Paulino',
            'lastname' => 'Salazar Corrales',
            'course_id' => 5
        ]);

        Student::create([
            'firstname' => 'José Rafael',
            'lastname' => 'Marín Mesa',
            'course_id' => 5
        ]);

        Student::create([
            'firstname' => 'Juan Ignacio',
            'lastname' => 'Elvira Carrera',
            'course_id' => 5
        ]);

        Student::create([
            'firstname' => 'Orlando Federico',
            'lastname' => 'Valle Torres',
            'course_id' => 5
        ]);

        Student::create([
            'firstname' => 'Gustavo Adolfo',
            'lastname' => 'Collado Moya',
            'course_id' => 6
        ]);

        Student::create([
            'firstname' => 'Pedro Javier',
            'lastname' => 'Patiño Durán',
            'course_id' => 6
        ]);

        Student::create([
            'firstname' => 'Mariano Alberto',
            'lastname' => 'Brito Valera',
            'course_id' => 6
        ]);

        Student::create([
            'firstname' => 'Dylan Gabriel',
            'lastname' => 'Tejedor Parra',
            'course_id' => 6
        ]);
        
    }
}
