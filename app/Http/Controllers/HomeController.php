<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke(){

        $courses = Course::where('user_id', auth()->user()->id)
                         ->orderBy('id', 'desc')
                         ->limit(4)
                         ->get();
        $events = Event::where('user_id', auth()->user()->id)
                       ->where('day', 'monday')
                       ->orderBy('start')
                       ->get();

        return view('welcome', compact('courses', 'events'));
    }
}
