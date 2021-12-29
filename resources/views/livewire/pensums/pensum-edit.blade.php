<div class="text-secondary-500">
    
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar pensum
        </x-slot>      

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre:"/>
                <x-jet-input id="input-edit-name" wire:model="name" @keyup.enter="document.querySelector('#button-edit-submit').click()" type="text" class="w-full" placeholder="Nombre del pensum"/>

                <x-jet-input-error for="name" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col xs:flex-row justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="button-edit-submit" tag="button" class="btn--primary" wire:click="update" >
                    Actualizar pensum
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
