<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'day' => 1,
            'start' => '10:00:00',
            'end' => '12:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);

        Event::create([
            'day' => 2,
            'start' => '10:00:00',
            'end' => '12:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);
        
        Event::create([
            'day' => 3,
            'start' => '10:00:00',
            'end' => '12:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);

        Event::create([
            'day' => 4,
            'start' => '10:00:00',
            'end' => '12:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);

        Event::create([
            'day' => 5,
            'start' => '10:00:00',
            'end' => '12:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);

    }
}
