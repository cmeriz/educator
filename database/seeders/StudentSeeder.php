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
            'firstname' => 'Deriam Juliano',
            'lastname' => 'Vallejo Espinoza',
            'course_id' => 1
        ]);
        Student::create([
            'firstname' => 'Fausto Eduardo',
            'lastname' => 'Gavela Vera',
            'course_id' => 1
        ]);
    }
}
