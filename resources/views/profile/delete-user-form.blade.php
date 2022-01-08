<x-jet-action-section>
    <x-slot name="title">
        Eliminar cuenta
    </x-slot>

    <x-slot name="description">
        Elimina permanentemente tu cuenta
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Una vez que tu cuenta haya sido borrada, todos sus recursos y datos serán permanente borrados. Antes de borrar tu cuenta, porfavor, descarga cualquier dato o información que quieras conservar.
        </div>

        <div class="mt-5">
            <x-button wire:click="confirmUserDeletion" wire:loading.attr="disabled" class="btn--danger">
                Eliminar cuenta
            </x-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                Eliminar cuenta
            </x-slot>

            <x-slot name="content">
                ¿Estas seguro que quieres borrar tu cuenta? Una vez que tu cuenta haya sido borrada, todos sus recursos y datos serán permanente borrados. Antes de borrar tu cuenta, porfavor, descarga cualquier dato o información que quieras conservar.

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="Contraseña"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    Eliminar cuenta
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
