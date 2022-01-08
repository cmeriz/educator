<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Pensum;
use Livewire\Component;
use Illuminate\Validation\Validator;

class PensumProgress extends Component
{
    public $pensum, $course;
    public $pensum_to_assign = null;

    protected $rules = [
        'pensum_to_assign' => 'required',
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->pensum = $this->course->pensum;
    }

    protected $listeners = [
        'pensumRemove' => 'remove',
    ];

    public function render()
    {
        // Initilizing lessons variable
        $lessons = null;

        // Getting all current pensum's lessons if they exist
        if($this->pensum){
            $lessons = Lesson::where('pensum_id', $this->pensum->id)->get();
        }

        return view('livewire.pensums.pensum-progress', compact('lessons'));

    }

    public function toggle(Lesson $lesson){

        // Attaching/Detaching register in courses/lessons intermediate table
        // If register exists means lessons has been covered
        // If register doesn't exists means lesson hasn't been covered

        $lesson->courses()->toggle([$this->course->id]);
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡Progreso actualizado!');
    }

    public function assign(){

        // Validating request
        $this->validate();

        // Finding 
        $new_pensum = Pensum::find($this->pensum_to_assign);

        // Verifying if user is new_pensum's owner
        $this->authorize('owner', $new_pensum);

        $this->course->pensum_id = $new_pensum->id;

        $this->course->save();
        $this->refreshPage();

        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El pensum fue asignado exitosamente!');

    }

    public function remove(){

        // Nulling pensum_id in course
        $this->course->pensum_id = null;

        // Updating course
        $this->course->save();

        // Resetting component & showing results
        $this->refreshPage();

        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El pensum fue removido exitosamente!');

    }

    public function refreshPage(){
        // Resetting course & pensum properties to reflect changes in view
        $this->course = Course::firstWhere('id', $this->course->id);
        $this->pensum = $this->course->pensum;
    }

}
