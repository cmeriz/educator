<div class="lessons-index flex flex-col gap-8 p-8 md:card-shadow w-full text-secondary-500 md:rounded-lg">
    
    <div class="flex justify-between">
        <h2 class="text-2xl font-medium">Lecciones</h2>
        <div class="flex gap-4">
            <x-button tag="anchor" href="{{ route('pensums.index') }}" class="btn--primary-outlined">
                Volver a Pensums
            </x-button>
            @livewire('lessons.lesson-create', ['pensum' => $pensum->id])
        </div>
    </div>

    @if ($lessons->count() > 0)
        <div class="flex flex-col gap-8">
            @foreach ($lessons as $item)
                <div class="flex items-center gap-6 bg-gray-50 rounded-lg p-3 font-semibold">
                    <div class="flex items-center">
                        <span class="flex justify-center items-center rounded-lg bg-white h-12 w-12">
                            {{ $loop->iteration }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between flex-1 gap-2">
                        
                        @if ($item->id == $lesson->id)
                            <form wire:submit.prevent="update" class="flex flex-col w-full">
                                <div class="flex flex-1 gap-4">
                                <input wire:model="lesson.title" placeholder="Título de la lección" autofocus type="text" class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-white placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full">
                                    <div class="flex gap-4">
                                        <i wire:click="edit" class="btn--gray-outlined">Cancelar</i>
                                        <x-button type="submit" class="btn--primary">Actualizar</x-button>
                                    </div>
                                </div>
                                <x-jet-input-error for="lesson.title" class="mt-2" />
                            </form>
                        @else
                            <h3>{{ $item->title }}</h3>
                            <div class="flex gap-2">
                                <x-button class="bg-blue-100 text-blue-500 hover:scale-105 transition-all p-2 rounded-lg self-end" wire:click="edit({{$item}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </x-button>
                                <x-button wire:click="$emit('modelDeleteAttempt', {{ $item }}, 'lessonDelete', '¿Borrar lección?')" class="bg-red-100 text-red-500 hover:scale-105 transition-all p-2 rounded-lg self-end" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </x-button>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>
            Aun no tienes lecciones. Añádelas y mantén un control del avance en tus cursos.
        </p>
    @endif





</div>