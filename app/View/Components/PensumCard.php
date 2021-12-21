<?php

namespace App\View\Components;

use App\Models\Course;
use Illuminate\View\Component;

class PensumCard extends Component
{

    public $id, $name, $courses_count, $lessons_count, $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $class = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->courses_count = Course::where('pensum_id', $id)->count();
        $this->lessons_count = 0;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pensum-card');
    }
}
