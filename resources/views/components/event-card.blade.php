<article {{ $attributes }} class="event-card--{{ $event->course->color }} flex flex-col gap-4 p-6 rounded-lg card-shadow font-medium transition-all {{ $class }} hover:scale-105">

    <a href="{{ route('courses.grades', $event->course->id) }}">
        
        {{-- Event name --}}
        <h1 class="mb-2">{{ $event->course->name }}</h1>

        {{-- Event time --}}
        <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span>{{ substr($event->start, 0, 5) . ' - ' . substr($event->end, 0, 5) }}</span>

        </div>
    </a>

    {{-- Event buttons --}}
    @if ($controls)
        <div class="flex justify-end gap-2">
            {{-- Edit Button --}}
            <button wire:click="$emit('eventEdit', {{ $event->id }})" x-on:click="setTimeout(function(){document.querySelector('#edit-input-course').focus();}, 500);" class="hover:scale-105 transition-transform p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>
            {{-- Delete Button --}}
            <button wire:click="$emit('modelDeleteAttempt', {{ $event->id }}, 'eventDelete', '¿Borrar evento?')" class="hover:scale-105 transition-transform p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
    @endif    

</article>