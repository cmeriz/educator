<div class="text-secondary-500">
    <x-button class="btn--icon--primary" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </x-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva lección
        </x-slot>      

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Título:"/>
                <x-jet-input wire:model="title" type="text" class="w-full" placeholder="Título de la lección"/>

                <x-jet-input-error for="title" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col xs:flex-row justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button tag="button" class="btn--primary" wire:click="save" >
                    Crear lección
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
