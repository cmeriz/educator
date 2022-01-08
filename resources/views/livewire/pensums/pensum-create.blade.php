<div class="text-secondary-500 mr-0 ml-auto">

    <x-button class="btn--icon--primary" x-on:click="setTimeout(() => document.querySelector('#input-name').focus(), 400);" wire:click="$set('open', true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </x-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo pensum
        </x-slot>      

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre:"/>
                <x-jet-input @keyup.enter="document.querySelector('#button-submit').click()" id="input-name" wire:model="name" type="text" class="w-full" placeholder="Nombre del pensum"/>

                <x-jet-input-error for="name" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col xs:flex-row justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="button-submit" tag="button" class="btn--primary" wire:click="save" >
                    Crear pensum
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
