<x-app-layout>
    <x-slot name="header">
        Mi Horario
    </x-slot>

    @livewire('events.events-index')

    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>