<div class="text-secondary-500 absolute right-8 top-8 z-20">

    <x-button class="btn--icon--primary" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </x-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo evento
        </x-slot>

        <x-slot name="content">

            <div class="flex flex-col mb-4">
                <x-jet-label value="Curso:"/>
                <select wire:model="course_id" class="border-secondary-100 {{ $course_id ? 'text-secondary-500' : 'text-secondary-300' }} focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                    <option value="null" selected disabled hidden>Selecciona un curso</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" class="text-secondary-500">{{ $course->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="course_id" />
            </div>

            <div class="flex flex-col mb-4">
                <x-jet-label value="Día:"/>
                <select wire:model="day" class="border-secondary-100 {{ $day ? 'text-secondary-500' : 'text-secondary-300' }} focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                    <option value="null" selected disabled hidden>Selecciona un día</option>
                    <option value="monday" class="text-secondary-500">Lunes</option>
                    <option value="tuesday" class="text-secondary-500">Martes</option>
                    <option value="wednesday" class="text-secondary-500">Miércoles</option>
                    <option value="thursday" class="text-secondary-500">Jueves</option>
                    <option value="friday" class="text-secondary-500">Viernes</option>
                    <option value="saturday" class="text-secondary-500">Sábado</option>
                    <option value="sunday" class="text-secondary-500">Domingo</option>
                </select>

                <x-jet-input-error for="day"/>
            </div>

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
                    Crear evento
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>