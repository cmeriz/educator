<div class="text-secondary-500">

    <x-button x-on:click="setTimeout(() => document.querySelector('#input-edit-name-{{ $pensum->id }}').focus(), 400);" class="bg-blue-100 text-blue-500 hover:scale-105 transition-all p-2 rounded-lg self-end" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </x-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar pensum
        </x-slot>      

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre:"/>
                <x-jet-input id="input-edit-name-{{ $pensum->id }}" wire:model="pensum.name" @keyup.enter="document.querySelector('#button-edit-submit-{{ $pensum->id }}').click()" type="text" class="w-full" placeholder="Nombre del pensum"/>

                <x-jet-input-error for="pensum.name" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col xs:flex-row justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="button-edit-submit-{{ $pensum->id }}" tag="button" class="btn--primary" wire:click="update" >
                    Actualizar pensum
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
