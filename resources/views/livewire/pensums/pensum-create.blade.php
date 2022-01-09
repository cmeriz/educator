<div class="text-secondary-500 mr-0 ml-auto z-40">

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
