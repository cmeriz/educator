<x-app-layout>

    {{-- Title --}}
    <x-slot name="title">
        eDUCATOR - Cursos
    </x-slot>

    {{-- Header --}}
    <x-slot name="header">
        Mis Cursos
    </x-slot>

    {{-- Courses Section --}}
    @livewire('courses.courses-index')

    {{-- Scripts --}}
    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>