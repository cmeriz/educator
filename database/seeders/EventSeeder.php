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
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);

        Event::create([
            'day' => 'tuesday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);
        
        Event::create([
            'day' => 'wednesday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);

        Event::create([
            'day' => 'thursday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);

        Event::create([
            'day' => 'friday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);

        Event::create([
            'day' => 'saturday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 2,
        ]);

        Event::create([
            'day' => 'sunday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 1,
            'course_id' => 1,
        ]);

        Event::create([
            'day' => 'monday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 3,
        ]);

        Event::create([
            'day' => 'tuesday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 4,
        ]);
        
        Event::create([
            'day' => 'wednesday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 5,
        ]);

        Event::create([
            'day' => 'thursday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 6,
        ]);

        Event::create([
            'day' => 'friday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 3,
        ]);

        Event::create([
            'day' => 'saturday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 4,
        ]);

        Event::create([
            'day' => 'sunday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 5,
        ]);

        Event::create([
            'day' => 'monday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 6,
        ]);

        Event::create([
            'day' => 'tuesday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 3,
        ]);
        
        Event::create([
            'day' => 'wednesday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 4,
        ]);

        Event::create([
            'day' => 'thursday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 5,
        ]);

        Event::create([
            'day' => 'friday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 6,
        ]);

        Event::create([
            'day' => 'saturday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 3,
        ]);

        Event::create([
            'day' => 'sunday',
            'start' => '08:00:00',
            'end' => '09:00:00',
            'user_id' => 2,
            'course_id' => 4,
        ]);

    }
}
