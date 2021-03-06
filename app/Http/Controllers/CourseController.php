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

        // Verify course ownership
        $this->authorize('owner', $course);

        return view('courses.grades', compact('course'));
    }

    public function attendances(Course $course){

        // Verify course ownership
        $this->authorize('owner', $course);

        return view('courses.attendances', compact('course'));
    }

    public function pensum(Course $course){

        // Verify course ownership
        $this->authorize('owner', $course);
        
        return view('courses.pensum', compact('course'));
    }

    // Weightings Validation when Creating & Editing
    public static function weightingsValidation($weight1, $weight2, $weight3){

        // Flag result variable
        $result = false;

        // When all weightings add up to 100 values are valid
        if(($weight1 + $weight2 + $weight3) == 100){
            $result = true;
        }

        return $result;
    }

}
