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
        $courses = Course::where('user_id', auth()->user()->id)
                          ->where('name', 'LIKE', '%' . $this->search . '%')
                          ->latest()
                          ->paginate(6);

        return view('livewire.courses.courses-index', compact('courses'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function destroy(Course $course){
        $course->delete();

        $this->emit('alert', 'success', '¡El curso fue eliminado exitosamente!');
        $this->emitSelf('render');

    }

}
