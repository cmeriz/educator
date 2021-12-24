<div class="pensums-index flex flex-col gap-8 p-8 md:card-shadow w-full md:rounded-lg">
    <div class="pensums-index__controls flex justify-between">
        <x-jet-input type="text" wire:model="search" class="input-search w-9/12 md:w-2/4" placeholder="Buscar pensum..."/>

        @livewire('pensums.pensum-create')

    </div>
    <div class="pensums-index__grid grid grid-cols-6 gap-8">
        @foreach ($pensums as $pensum)
            <x-pensum-card :pensum="$pensum" class="col-span-6 sm:col-span-3 xl:col-span-2" />
        @endforeach
    </div>

    @if ($pensums->hasPages())
        <div class="pensums-index__pagination mt-auto">
            {{ $pensums->links() }}
        </div>
    @endif
    
</div>
