<div x-data="{
    openColor: false,
    selectedColor: 'Selecciona un color',
    openPensum: false,
    selectedPensum: 'Selecciona un pensum',
}">

    <x-button id="open-modal" class="bg-white hover:scale-105 transition-all p-2 rounded-lg" 
        wire:click="$set('open', true)" 
        @click="
            openColor = openPensum = false;
            selectedPensum = '{{ $pensum_name }}';
            document.querySelector('#input-color-{{ $color . '-' . $course_id }}').click();
            setTimeout(() => document.querySelector('#input-name-{{ $course_id }}').focus(), 400);
    ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </x-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            <h3 class="text-secondary-500">Crear nuevo curso</h3>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 text-secondary-500">
                <x-jet-label value="Nombre:"/>
                <input id="input-name-{{ $course_id }}" wire:model="name" type="text" placeholder="Nombre del curso"  class="border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg w-full"/>
                <x-jet-input-error for="name" />
            </div>

            <div class="flex flex-col mb-4 text-secondary-500">
                <x-jet-label value="Color del Curso:"/>
                <div class="relative w-full">
                    <button x-on:click="openColor = !openColor" @click.away="openColor = false" class="flex justify-between items-center border text-left whitespace-nowrap overflow-hidden border-secondary-100 focus:border-secondary-100 bg-secondary-50 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 w-full rounded-lg">
                        <span x-text="selectedColor" class="mr-4 text-secondary-500">
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="flex flex-col gap-4 absolute left-0 w-64 bg-white p-4 rounded-lg shadow-lg z-10" x-show="openColor">
                        <div id="input-color-primary-{{ $course_id }}" wire:click="$set('color', 'primary')" x-on:click="selectedColor = 'Verde';" class="flex justify-between items-center cursor-pointer">Verde <span class="block h-4 w-4 rounded-sm bg-primary-500"></span> </div>
                        <div id="input-color-secondary-{{ $course_id }}" wire:click="$set('color', 'secondary')" x-on:click="selectedColor = 'Negro';" class="flex justify-between items-center cursor-pointer">Negro <span class="block h-4 w-4 rounded-sm bg-secondary-500"></span> </div>
                        <div id="input-color-red-{{ $course_id }}" wire:click="$set('color', 'red')" x-on:click="selectedColor = 'Rojo';" class="flex justify-between items-center cursor-pointer">Rojo <span class="block h-4 w-4 rounded-sm bg-red-500"></span> </div>
                        <div id="input-color-orange-{{ $course_id }}" wire:click="$set('color', 'orange')" x-on:click="selectedColor = 'Naranja';" class="flex justify-between items-center cursor-pointer">Naranja <span class="block h-4 w-4 rounded-sm bg-orange-500"></span> </div>
                        <div id="input-color-blue-{{ $course_id }}" wire:click="$set('color', 'blue')" x-on:click="selectedColor = 'Azul';" class="flex justify-between items-center cursor-pointer">Azul <span class="block h-4 w-4 rounded-sm bg-blue-500"></span> </div>
                        <div id="input-color-purple-{{ $course_id }}" wire:click="$set('color', 'purple')" x-on:click="selectedColor = 'Morado';" class="flex justify-between items-center cursor-pointer">Morado <span class="block h-4 w-4 rounded-sm bg-purple-500"></span> </div>
                        <div id="input-color-pink-{{ $course_id }}" wire:click="$set('color', 'pink')" x-on:click="selectedColor = 'Rosado';" class="flex justify-between items-center cursor-pointer">Rosado <span class="block h-4 w-4 rounded-sm bg-pink-500"></span> </div>
                    </div>
                </div>

                <x-jet-input-error for="color" />

            </div>

            <div>
                <x-jet-label value="Pensum del Curso:"/>
                <div class="relative w-full text-secondary-500">
                    <button x-on:click="openPensum = !openPensum" @click.away="openPensum = false" class="flex justify-between items-center border text-left whitespace-nowrap overflow-hidden border-secondary-100 focus:border-secondary-100 bg-secondary-50 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 w-full rounded-lg">
                        <span x-text="selectedPensum" class="mr-4 text-secondary-500">
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="flex flex-col gap-4 absolute left-0 w-full bg-white p-4 rounded-lg shadow-lg z-10" x-show="openPensum">
                        @foreach ($pensums as $pensum)
                            <div id="input-pensum-{{ $pensum->id . '-' . $course_id }}" wire:click="$set('pensum_id', {{ $pensum->id }})" x-on:click="selectedPensum = '{{ $pensum->name }}'" class="flex justify-between items-center cursor-pointer">
                                {{ $pensum->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <x-jet-input-error for="pensum_id" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="submit-button" tag="button" class="btn--primary" wire:click="update" >
                    Actualizar curso
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
