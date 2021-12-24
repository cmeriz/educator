<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Pensum;
use Livewire\Component;
use Livewire\WithPagination;

class PensumsIndex extends Component
{

    public $search;

    use WithPagination;

    protected $listeners = [
        'pensumDelete' => 'destroy',
        'render'
    ];

    public function render()
    {
        $pensums = Pensum::where('user_id', auth()->user()->id)
                         ->where('name', 'like', '%' . $this->search . '%')
                         ->latest()
                         //->get();
                         ->paginate(6);
        return view('livewire.pensums.pensums-index', compact('pensums'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function destroy(Pensum $pensum){

        $pensum->delete();
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El pensum fue borrado exitosamente!');

    }

}
