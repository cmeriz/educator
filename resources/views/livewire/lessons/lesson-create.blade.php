<div class="text-secondary-500 mr-0 ml-auto z-40">

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva lección
        </x-slot>      

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Título:"/>
                <x-jet-input id="input-title" wire:model="title" type="text" class="w-full" placeholder="Título de la lección"/>

                <x-jet-input-error for="title" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col xs:flex-row justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button tag="button" class="btn--primary order-first xs:order-none" wire:click="save" >
                    Crear lección
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
