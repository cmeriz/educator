<div class="text-secondary-500 z-40">

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar estudiante
        </x-slot>      

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombres:"/>
                <x-jet-input wire:model="firstname" type="text" class="w-full" placeholder="Nombres del estudiante"/>

                <x-jet-input-error for="firstname" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellidos:"/>
                <x-jet-input wire:model="lastname" type="text" class="w-full" placeholder="Apellidos del estudiante"/>

                <x-jet-input-error for="lastname" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col xs:flex-row justify-end gap-4">
                <x-button tag="button" class="btn--primary-outlined" wire:click="$set('open', false)">
                    Cancelar
                </x-button>
                <x-button id="button-submit" tag="button" class="btn--primary" wire:click="update" >
                    Actualizar estudiante
                </x-button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>

</div>
