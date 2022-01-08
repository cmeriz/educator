<div class="pensums-index flex flex-col gap-8 p-8 md:card-shadow w-full md:rounded-lg">

    {{-- Controls --}}
    <div class="pensums-index__controls flex justify-between">

        <x-jet-input type="text" wire:model="search" class="input-search w-9/12 md:w-2/4" placeholder="Buscar pensum..."/>

        @livewire('pensums.pensum-create')

    </div>

    @if (count($pensums) > 0)
        {{-- Pensum grid --}}
        <div class="pensums-index__grid relative grid grid-cols-6 gap-8">

            <x-loader/>

            @foreach ($pensums as $pensum)
                {{-- Pensum --}}
                <x-pensum-card :pensum="$pensum" class="col-span-6 sm:col-span-3 xl:col-span-2" />
            @endforeach
        </div>

        @if ($pensums->hasPages())
            {{-- Pagination --}}
            <div class="pensums-index__pagination mt-auto">
                {{ $pensums->links() }}
            </div>
        @endif
        
        @livewire('pensums.pensum-edit')

    @elseif (count($pensums) === 0 && $search)

        <p class="self-start">No hay pensums que coincidan con la búsqueda</p>

    @elseif(count($pensums) === 0 && !$search)

        {{-- No pensums --}}
        <div class="flex flex-col md:flex-row md:items-center justify-around gap-4 w-full text-secondary-500">
            <p class="text-2xl font-medium mb-6">
                No tienes pensums. ¡Añadelos!
            </p>
            <img class="mx-auto md:m-0 w-full sm:w-4/5 md:w-80 lg:w-96" src="{{ asset('img/no-pensums.svg') }}" alt="No pensums">
        </div>
    @endif

        

</div>
