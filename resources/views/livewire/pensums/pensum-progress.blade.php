<div class="pensum-progress flex flex-col justify-start gap-6 flex-1">

    @if ($pensum)
    <div class="flex items-center justify-between self-start w-full">
        <h3>
            <strong>Pensum:</strong>
            {{ $pensum->name }}
        </h3>
            <x-button wire:click="remove" class="btn--danger">
                Remover pensum
            </x-button>        
    </div>

    <div class="flex flex-col gap-4 self-start flex-1 w-full">
        @foreach ($lessons as $lesson)

            @php
                $completed = $lesson->getCompletedAttribute($course->id);
            @endphp

            <div class="flex items-center justify-between {{ $completed ? 'bg-primary-100' : 'bg-gray-50' }}  rounded-lg p-3 pr-6 font-semibold">
                <div class="flex gap-6 items-center {{ $completed ? 'text-primary-500' : 'text-secondary-500' }}">
                    <span class="flex justify-center items-center rounded-lg bg-white h-12 w-12">
                        {{ $loop->iteration }}
                    </span>
                    <h3 class="{{ $completed ? 'line-through' : '' }}">{{ $lesson->title }}</h3>
                </div>

                <button wire:click="toggle({{ $lesson->id }})" class="{{ $completed ? 'text-primary-500' : 'text-secondary-200' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        @endforeach
    </div>

    @else

    <div class="flex items-center justify-between gap-8 self-start w-full">

        <select wire:model="pensum_to_assign" class="border-secondary-100 {{ !$pensum_to_assign ? 'text-secondary-300' : 'text-secondary-500' }} focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full">
            <option value="null" disabled hidden>Asigna uno de tus pensums al curso</option>
            @foreach ($course->user->pensums as $pensum)
                <option value="{{ $pensum->id }}" class="text-secondary-500">
                    {{ $pensum->name }}
                </option>
            @endforeach
        </select>

        <x-button wire:click="assign" class="btn--danger whitespace-nowrap">
            Asignar pensum
        </x-button>        
    </div>

    @endif


</div>
