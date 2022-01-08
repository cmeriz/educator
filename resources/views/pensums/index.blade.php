<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        Mis Pensums
    </x-slot>

    {{-- Pensums Section --}}
    @livewire('pensums.pensums-index', [], key('pensums-index'))

    {{-- Scripts --}}
    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>