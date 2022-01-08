<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesIndex extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $search;

    protected $listeners = [
        'deleteCourse' => 'destroy',
        'render'
    ];

    public function render()
    {
        // Getting all user's courses filtered and ordered
        $courses = Course::where('user_id', auth()->user()->id)
                          ->where('name', 'LIKE', '%' . $this->search . '%')
                          ->orderBy('id', 'desc')
                          ->paginate(6);

        return view('livewire.courses.courses-index', compact('courses'));
    }

    public function updatingSearch(){
        // If search is updated, refresh page to prevent missing results for valid searchings
        $this->resetPage();
    }

    public function destroy(Course $course){

        // Verifying if user is course's owner
        $this->authorize('owner', $course);

        $course->delete();

        $this->emit('alert', 'success', '¡El curso fue eliminado exitosamente!');
        $this->emitSelf('render');

    }

}
