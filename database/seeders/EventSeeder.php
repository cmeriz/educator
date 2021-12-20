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
            'day' => 'monday',
            'start' => '21:00:00',
            'end' => '22:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);

        Event::create([
            'day' => 'monday',
            'start' => '13:00:00',
            'end' => '14:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);
        
        Event::create([
            'day' => 'monday',
            'start' => '15:00:00',
            'end' => '16:00:00',
            'user_id' => 1,
            'course_id' => 3,
        ]);

        Event::create([
            'day' => 'tuesday',
            'start' => '07:00:00',
            'end' => '08:00:00',
            'user_id' => 1,
            'course_id' => 4,
        ]);

        Event::create([
            'day' => 'tuesday',
            'start' => '19:00:00',
            'end' => '20:00:00',
            'user_id' => 1,
            'course_id' => 5,
        ]);

    }
}
