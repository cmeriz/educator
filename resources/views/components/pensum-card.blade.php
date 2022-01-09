<article {{ $attributes }} class="pensum-card flex flex-col bg-white text-secondary-500 p-6 shadow-md card-shadow rounded-lg overflow-hidden hover:scale-105 transition-all {{ $class }}">

    <a href="{{ route('pensums.show', $pensum ) }}" class="flex flex-col gap-2">

        {{-- Pensum name --}}
        <h1 class="font-medium">{{ $pensum->name }}</h1>

        {{-- Pensum courses --}}
        <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            <span>
                {{ $pensum->courses_count }} curso(s)
            </span> 
        </div>

        {{-- Pensum lessons --}}
        <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <span>
                {{ $pensum->lessons_count }} leccion(es)
            </span>
        </div>
    </a>

    {{-- Pensum buttons --}}
    <div class="pensum-card__buttons flex justify-end gap-2 mt-2">

        {{-- Edit button --}}
        <x-button wire:click="$emit('pensumEdit', {{ $pensum->id }})" x-on:click="setTimeout(function(){document.querySelector('#edit-input-name').focus();}, 500);" class="bg-blue-100 text-blue-500 hover:scale-105 transition-all p-2 rounded-lg self-end">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </x-button>

        {{-- Delete Button --}}
        <button wire:click="$emit('modelDeleteAttempt', {{ $pensum->id }}, 'pensumDelete', '¿Borrar pensum?')" class="bg-red-100 text-red-500 hover:scale-105 transition-all p-2 rounded-lg self-end">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </div>

</article>