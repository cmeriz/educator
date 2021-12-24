<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Pensum;
use Livewire\Component;

class PensumCreate extends Component
{

    public $name;
    public $open = false;

    protected $rules = [
        'name' => 'required|max:50',
    ];

    protected $messages = [
        'name.required' => 'Este campo es obligatorio',
        'name.max' => 'Este campo no puede tener más de 50 caracteres',
    ];

    public function render()
    {
        return view('livewire.pensums.pensum-create');
    }

    public function save(){

        $this->validate();

        Pensum::create([
            'name' => $this->name,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset(['name', 'open']);
        $this->emitTo('pensums.pensums-index', 'render');
        $this->emit('alert', 'success', '¡El pensum fue creado exitosamente!');

    }
}
