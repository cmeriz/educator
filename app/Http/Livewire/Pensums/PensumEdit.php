<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Pensum;
use Livewire\Component;

class PensumEdit extends Component
{
    public $open = false;
    public $pensum;

    public function mount(Pensum $pensum){
        $this->pensum = $pensum;
    }

    protected $rules = [
        'pensum.name' => 'required|max:50',
    ];

    protected $messages = [
        'pensum.name.required' => 'Este campo es obligatorio',
        'pensum.name.max' => 'Este campo no puede tener más de 50 caracteres',
    ];

    public function render()
    {
        return view('livewire.pensums.pensum-edit');
    }

    public function update(){

        $this->validate();

        $this->pensum->save();

        $this->reset(['open']);

        $this->emitTo('pensums.pensums-index', 'render');
        $this->emit('alert', 'success', '¡El pensum fue actualizado exitosamente!');

    }
}
