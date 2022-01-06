<div class="text-secondary-500">

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva clase
        </x-slot>      

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Fecha:"/>
                <x-jet-input wire:model="date" type="date" class="w-full"/>

                <x-jet-input-error for="date" />
                <x-jet-input-error for="repeated" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col xs:flex-row justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="button-submit" tag="button" class="btn--primary" wire:click="save" >
                    Crear clase
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
