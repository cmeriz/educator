<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Pensum;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PensumEdit extends Component
{
    use AuthorizesRequests;

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

        // Verifying if user is lesson's owner
        $this->authorize('owner', $pensum);

        // Setting component properties to edit pensum and opening modal
        $this->pensum = $pensum;
        $this->name = $this->pensum->name;
        $this->open = true;
    }


    public function update(){

        // Verifying if user is lesson's owner
        $this->authorize('owner', $this->pensum);

        // Validating request
        $this->validate();

        // Updating pensum
        $this->pensum->name = $this->name;
        $this->pensum->save();

        // Resetting component & showing results
        $this->reset(['open', 'pensum', 'name']);
        $this->emitTo('pensums.pensums-index', 'render');
        $this->emit('alert', 'success', '¡El pensum fue actualizado exitosamente!');

    }
}