<div x-data="
    {
        openCourse: false,
        filledCourse: false,
        selectedCourse: 'Selecciona un curso',
        openDay: false,
        filledDay: false,
        selectedDay: 'Selecciona un día de la semana',
        startHours: '00',
        startMinutes: '00',
    }
    " class="text-secondary-500 absolute right-8 top-8">

    <x-button id="open-modal" class="btn--icon--primary" 
        wire:click="$set('open', true)"
        @click="
            openCourse = filledCourse = openDay = filledDay =  false;
            selectedCourse = 'Selecciona un curso';
            selectedDay = 'Selecciona un día de la semana';
            startHours = startMinutes = '00';
        "
        >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </x-button>

    <x-jet-dialog-modal @keyup.enter="document.querySelector('#submit-button').click()" wire:model="open">

        <x-slot name="title">
            Crear nuevo evento
        </x-slot>

        <x-slot name="content">

            <x-jet-label value="Curso:"/>
            <div class="relative w-full">
                <button x-on:click="openCourse = !openCourse" @click.away="openCourse = false" class="flex justify-between items-center border text-left whitespace-nowrap overflow-hidden border-secondary-100 focus:border-secondary-100 bg-secondary-50 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 w-full rounded-lg">
                    <span :class="filledCourse ? 'text-secondary-500' : 'text-secondary-300'" x-text="selectedCourse" class="mr-4">
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="flex flex-col gap-4 absolute left-0 w-full bg-white p-4 rounded-lg shadow-lg z-10" x-show="openCourse">
                    @foreach ($courses as $course)
                        <div wire:click="$set('course_id', {{ $course->id }})" x-on:click="selectedCourse = '{{ $course->name }}'; filledCourse = true;" class="flex justify-between items-center cursor-pointer">
                            {{ $course->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <x-jet-input-error for="course" />

            <x-jet-label value="Día:"/>
            <div class="relative w-full">
                <button x-on:click="openDay = !openDay" @click.away="openDay = false" class="flex justify-between items-center border text-left whitespace-nowrap overflow-hidden border-secondary-100 focus:border-secondary-100 bg-secondary-50 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 w-full rounded-lg">
                    <span :class="filledDay ? 'text-secondary-500' : 'text-secondary-300'" x-text="selectedDay" class="mr-4">
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="flex flex-col gap-4 absolute left-0 w-full bg-white p-4 rounded-lg shadow-lg z-10" x-show="openDay">
                    <div wire:click="$set('day', 'monday')" x-on:click="selectedDay = 'Lunes'; filledDay = true;" class="flex justify-between items-center cursor-pointer">
                        Lunes
                    </div>
                    <div wire:click="$set('day', 'tuesday')" x-on:click="selectedDay = 'Martes'; filledDay = true;" class="flex justify-between items-center cursor-pointer">
                        Martes
                    </div>
                    <div wire:click="$set('day', 'wednesday')" x-on:click="selectedDay = 'Miércoles'; filledDay = true;" class="flex justify-between items-center cursor-pointer">
                        Miércoles
                    </div>
                    <div wire:click="$set('day', 'thursday')" x-on:click="selectedDay = 'Jueves'; filledDay = true;" class="flex justify-between items-center cursor-pointer">
                        Jueves
                    </div>
                    <div wire:click="$set('day', 'friday')" x-on:click="selectedDay = 'Viernes'; filledDay = true;" class="flex justify-between items-center cursor-pointer">
                        Viernes
                    </div>
                    <div wire:click="$set('day', 'saturday')" x-on:click="selectedDay = 'Sábado'; filledDay = true;" class="flex justify-between items-center cursor-pointer">
                        Sábado
                    </div>
                    <div wire:click="$set('day', 'sunday')" x-on:click="selectedDay = 'Domingo'; filledDay = true;" class="flex justify-between items-center cursor-pointer">
                        Domingo
                    </div>
                </div>
            </div>
            <x-jet-input-error for="course" />

            <div class="flex gap-4">
                <div class="flex-1">
                    <x-jet-label value="Hora de inicio:"/>
                    <x-jet-input wire:model="start" type="time" class="w-full"/>
                    <x-jet-input-error for="start" />
                </div>
                
                <div class="flex-1">
                    <x-jet-label value="Hora de fin:"/>
                    <x-jet-input wire:model="end" type="time" class="w-full"/>
                    <x-jet-input-error for="end" />
                </div>
                
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="submit-button" tag="button" class="btn--primary" wire:click="save">
                    Crear curso
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>