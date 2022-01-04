<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public static function create($activity_type, $course_id){

        Activity::create([
            'activity_type_id' => $activity_type,
            'course_id' => $course_id,
        ]);

    }
}
