<x-app-layout>
    <x-slot name="header">
        Mis Cursos
    </x-slot>

    @livewire('courses.courses-index')

    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>