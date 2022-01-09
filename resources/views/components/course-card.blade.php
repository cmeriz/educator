<article class="course-card--{{ $course->color }} flex flex-col relative p-6 hover:scale-105 transition-all rounded-lg card-shadow {{ $class }}
                " >
    <a href="{{ route('courses.grades', $course) }}" class="flex flex-col gap-3 flex-1">
        <div class="course-card__name-students flex flex-col ml:flex-row sm:justify-between items-start ml:items-center ml:gap-8">
            
            {{-- Course name --}}
            <h1 class="font-semibold">
                {{ $course->name }}
            </h1>

            {{-- Course students amount --}}
            <div class="flex items-center gap-2 font-medium text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                {{ $course->students_amount }}
            </div>

        </div>

        {{-- Course's pensum progress --}}
        <div class="flex flex-col mt-auto gap-3">
            <div class="course-card__progressbar{{ !$course->pensum ? '--disabled' : '' }} w-full h-2 rounded-full relative overflow-hidden transition-colors">
                @if ($course->pensum)
                    <div class="progress absolute top-0 left-0 h-2 transition-colors" style="width: {{ $course->progress }}%;"></div>
                @endif
            </div>

            <div class="course-card__progress text-sm flex justify-between items-center">
                @if ($course->pensum)
                    {{ $course->progress }}% completado
                @else
                    Pensum no asignado...
                @endif
            </div>
        </div>
        
    </a>

    {{-- Card buttons --}}
    
    @if ($controls)

        <div class="flex gap-2 self-end mt-2">
            {{-- Edit Button --}}
            <x-button class="bg-white hover:scale-105 transition-all p-2 rounded-lg" 
                wire:click="$emit('courseEdit', {{ $course->id }})" 
                x-on:click="
                    setTimeout(() => document.querySelector('#edit-input-name').focus(), 500);
                ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </x-button>

            {{-- Delete Button --}}

            <button wire:click="$emit('modelDeleteAttempt', {{ $course->id }}, 'deleteCourse', '¿Borrar curso?')" class=" bg-white hover:scale-105 transition-all p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
            
        </div>

    @endif

</article>
