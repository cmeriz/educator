<?php

namespace App\View\Components;

use App\Models\Course;
use Illuminate\View\Component;

class CourseCard extends Component
{

    public $name, $color, $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $color, $class)
    {
        $this->name = $name;
        $this->color = $color;
        $this->class = $class;
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
