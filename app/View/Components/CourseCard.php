<?php

namespace App\View\Components;

use App\Models\Course;
use Illuminate\View\Component;

class CourseCard extends Component
{

    public $course, $class, $controls;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Course $course, $class, $controls = false)
    {
        $this->course = $course;
        $this->class = $class;
        $this->controls = $controls;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.course-card');
    }
}
