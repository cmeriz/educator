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
            'name' => 'Administración de Sistemas',
            'user_id' => 1,
        ]);

        Pensum::create([
            'name' => 'Fundamentos de Programación',
            'user_id' => 2,
        ]);

        Pensum::create([
            'name' => 'Estructura de Datos',
            'user_id' => 2,
        ]);        
    }
}
