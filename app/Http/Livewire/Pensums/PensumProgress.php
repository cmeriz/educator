<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Pensum;
use Livewire\Component;

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

    public function render()
    {
        $lessons = null;
        if($this->pensum){
            $lessons = Lesson::where('pensum_id', $this->pensum->id)->get();
        }

        return view('livewire.pensums.pensum-progress', compact('lessons'));

    }

    public function toggle(Lesson $lesson){
        $lesson->courses()->toggle([$this->course->id]);
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡Progreso actualizado!');
    }

    public function assign(){

        $this->validate();

        $new_pensum = Pensum::find($this->pensum_to_assign);
        $this->course->pensum_id = $new_pensum->id;

        $this->course->save();
        $this->refreshPage();

        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El pensum fue asignado exitosamente!');

    }

    public function remove(){
        $this->course->pensum_id = null;
        $this->course->save();
        $this->refreshPage();

        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El pensum fue removido exitosamente!');

    }

    public function refreshPage(){
        $this->course = Course::firstWhere('id', $this->course->id);
        $this->pensum = $this->course->pensum;
    }

}
