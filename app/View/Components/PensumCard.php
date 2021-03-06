<?php

namespace App\View\Components;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Pensum;
use Illuminate\View\Component;

class PensumCard extends Component
{

    public $pensum, $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Pensum $pensum, $class = '')
    {
        $this->pensum = $pensum;
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
