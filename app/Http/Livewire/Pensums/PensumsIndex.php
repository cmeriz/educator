<?php

namespace App\Http\Livewire\Pensums;

use App\Models\Pensum;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PensumsIndex extends Component
{

    use WithPagination;
    use AuthorizesRequests;

    public $search;

    protected $listeners = [
        'pensumDelete' => 'destroy',
        'render'
    ];

    public function render()
    {
        // Getting all user's pensums filtered and ordered
        $pensums = Pensum::where('user_id', auth()->user()->id)
                         ->where('name', 'like', '%' . $this->search . '%')
                         ->orderBy('id', 'desc')
                         ->paginate(6);
        return view('livewire.pensums.pensums-index', compact('pensums'));
    }

    public function updatingSearch(){
        // If search is updated, refresh page to prevent missing results for valid searchings
        $this->resetPage();
    }

    public function destroy(Pensum $pensum){

        // Verifying if user is pensum's owner
        $this->authorize('owner', $pensum);

        // Destoying pensum register
        $pensum->delete();

        // Resetting component & showing results
        $this->emitSelf('render');
        $this->emit('alert', 'success', '¡El pensum fue borrado exitosamente!');

    }

}
