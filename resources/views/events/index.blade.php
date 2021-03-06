<x-app-layout>

    {{-- Title --}}
    <x-slot name="title">
        eDUCATOR - Horario
    </x-slot>

    {{-- Header --}}
    <x-slot name="header">
        Mi Horario
    </x-slot>

    {{-- Events Component --}}
    @livewire('events.events-index')

    {{-- Scripts --}}
    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>