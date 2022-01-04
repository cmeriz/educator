<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index');
    }

    public function grades(Course $course){
        return view('courses.grades', compact('course'));
    }

    public function attendances(Course $course){
        return view('courses.attendances', compact('course'));
    }

    public function pensum(Course $course){
        return view('courses.pensum', compact('course'));
    }

}
