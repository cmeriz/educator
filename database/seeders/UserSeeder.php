<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos Merizalde',
            'email' => 'cmerizalde27@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john_doe@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'Sarah Doe',
            'email' => 'sarah_doe@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'Luke Doe',
            'email' => 'luke_doe@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'Amber Doe',
            'email' => 'amber_doe@gmail.com',
            'password' => bcrypt('123456'),
        ]);

    }
}
