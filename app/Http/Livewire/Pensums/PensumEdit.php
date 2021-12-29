<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Pensum;
use Livewire\Component;

class PensumEdit extends Component
{

    public $open = false;
    public $name, $pensum;

    protected $listeners = [
        'pensumEdit' => 'editing'
    ];

    protected $rules = [
        'name' => 'required|max:50',
    ];

    protected $messages = [
        'name.required' => 'Este campo es obligatorio',
        'name.max' => 'Este campo no puede tener más de 50 caracteres',
    ];

    public function mount(){
        $this->pensum = new Pensum();
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.pensums.pensum-edit');
    }

    public function editing(Pensum $pensum){
        $this->open = true;
        $this->pensum = $pensum;
        $this->name = $this->pensum->name;
    }


    public function update(){

        $this->validate();

        $this->pensum->name = $this->name;

        $this->pensum->save();

        $this->reset(['open', 'pensum', 'name']);
        $this->emitTo('pensums.pensums-index', 'render');
        $this->emit('alert', 'success', '¡El pensum fue actualizado exitosamente!');

    }
}