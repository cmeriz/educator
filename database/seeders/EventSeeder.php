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
            'day' => 'tuesday',
            'start' => '13:00:00',
            'end' => '14:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);
        
        Event::create([
            'day' => 'wednesday',
            'start' => '15:00:00',
            'end' => '16:00:00',
            'user_id' => 1,
            'course_id' => 3,
        ]);

        Event::create([
            'day' => 'thursday',
            'start' => '07:00:00',
            'end' => '08:00:00',
            'user_id' => 1,
            'course_id' => 4,
        ]);

        Event::create([
            'day' => 'friday',
            'start' => '19:00:00',
            'end' => '20:00:00',
            'user_id' => 1,
            'course_id' => 5,
        ]);

        Event::create([
            'day' => 'saturday',
            'start' => '19:00:00',
            'end' => '20:00:00',
            'user_id' => 1,
            'course_id' => 6,
        ]);

        Event::create([
            'day' => 'sunday',
            'start' => '19:00:00',
            'end' => '20:00:00',
            'user_id' => 1,
            'course_id' => 7,
        ]);

        Event::create([
            'day' => 'monday',
            'start' => '12:00:00',
            'end' => '13:00:00',
            'user_id' => 1,
            'course_id' => 7,
        ]);

        Event::create([
            'day' => 'tuesday',
            'start' => '17:00:00',
            'end' => '18:00:00',
            'user_id' => 1,
            'course_id' => 6,
        ]);
        
        Event::create([
            'day' => 'wednesday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 5,
        ]);

        Event::create([
            'day' => 'thursday',
            'start' => '14:00:00',
            'end' => '15:00:00',
            'user_id' => 1,
            'course_id' => 8,
        ]);

        Event::create([
            'day' => 'friday',
            'start' => '16:00:00',
            'end' => '17:00:00',
            'user_id' => 1,
            'course_id' => 3,
        ]);

        Event::create([
            'day' => 'saturday',
            'start' => '12:00:00',
            'end' => '13:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);

        Event::create([
            'day' => 'sunday',
            'start' => '09:00:00',
            'end' => '10:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);

    }
}
