<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = [
        'deleteCourse' => 'destroy',
        'render'
    ];

    public function render()
    {
        $courses = Course::where('name', 'LIKE', '%' . $this->search . '%')
                          ->latest()
                          ->paginate(6);

        return view('livewire.courses.courses-index', compact('courses'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function destroy(Course $course){
        $course->delete();

        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El curso fue eliminado exitosamente!');

    }

}
