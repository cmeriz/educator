<div class="text-secondary-500">
    <x-button class="btn--primary-icon" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </x-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo curso
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre:"/>
                <x-jet-input wire:model="name" type="text" class="w-full" placeholder="Nombre del curso"/>

                <x-jet-input-error for="name" />

            </div>

            <div class="flex flex-col mb-4">
                <x-jet-label value="Color del Curso:"/>
                <div x-data="{ open: false, selected: 'Selecciona un color', filled: false }" class="relative w-full">
                    <button x-on:click="open = !open" @click.away="open = false" class="flex justify-between items-center border text-left whitespace-nowrap overflow-hidden border-secondary-100 focus:border-secondary-100 bg-secondary-50 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 w-full rounded-lg">
                        <span :class="filled ? 'text-secondary-500' : 'text-secondary-300'" x-text="selected" class="mr-4">
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="flex flex-col gap-4 absolute left-0 w-64 bg-white p-4 rounded-lg shadow-lg z-10" x-show="open">
                        <div wire:click="$set('color', 'primary')" x-on:click="selected = 'Verde'; filled = true;" class="flex justify-between items-center cursor-pointer">Verde <span class="block h-4 w-4 rounded-sm bg-primary-500"></span> </div>
                        <div wire:click="$set('color', 'secondary')" x-on:click="selected = 'Negro'; filled = true;" class="flex justify-between items-center cursor-pointer">Negro <span class="block h-4 w-4 rounded-sm bg-secondary-500"></span> </div>
                        <div wire:click="$set('color', 'red')" x-on:click="selected = 'Rojo'; filled = true;" class="flex justify-between items-center cursor-pointer">Rojo <span class="block h-4 w-4 rounded-sm bg-red-500"></span> </div>
                        <div wire:click="$set('color', 'orange')" x-on:click="selected = 'Naranja'; filled = true;" class="flex justify-between items-center cursor-pointer">Naranja <span class="block h-4 w-4 rounded-sm bg-orange-500"></span> </div>
                        <div wire:click="$set('color', 'blue')" x-on:click="selected = 'Azul'; filled = true;" class="flex justify-between items-center cursor-pointer">Azul <span class="block h-4 w-4 rounded-sm bg-blue-500"></span> </div>
                        <div wire:click="$set('color', 'purple')" x-on:click="selected = 'Morado'; filled = true;" class="flex justify-between items-center cursor-pointer">Morado <span class="block h-4 w-4 rounded-sm bg-purple-500"></span> </div>
                        <div wire:click="$set('color', 'pink')" x-on:click="selected = 'Rosado'; filled = true;" class="flex justify-between items-center cursor-pointer">Rosado <span class="block h-4 w-4 rounded-sm bg-pink-500"></span> </div>
                    </div>
                </div>

                <x-jet-input-error for="color" />

            </div>

            <div>
                <x-jet-label value="Pensum del Curso:"/>
                <div x-data="{ open: false, selected: 'Selecciona un pensum', filled: false }" class="relative w-full">
                    <button x-on:click="open = !open" @click.away="open = false" class="flex justify-between items-center border text-left whitespace-nowrap overflow-hidden border-secondary-100 focus:border-secondary-100 bg-secondary-50 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 w-full rounded-lg">
                        <span :class="filled ? 'text-secondary-500' : 'text-secondary-300'" x-text="selected" class="mr-4">
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="flex flex-col gap-4 absolute left-0 w-full bg-white p-4 rounded-lg shadow-lg z-10" x-show="open">
                        @foreach ($pensums as $pensum)
                            <div wire:click="$set('pensum', {{ $pensum->id }})" x-on:click="selected = '{{ $pensum->name }}'; filled = true;" class="flex justify-between items-center cursor-pointer">{{ $pensum->name }}</div>
                        @endforeach
                    </div>
                </div>
                <x-jet-input-error for="pensum" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button tag="button" class="btn--primary" wire:click="save" >
                    Crear curso
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
