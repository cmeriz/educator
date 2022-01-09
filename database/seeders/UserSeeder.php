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
            'email' => 'developer@educator.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john_doe@mail.com',
            'password' => bcrypt('O2:Y|MNBKy4k'),
        ]);
    }
}
