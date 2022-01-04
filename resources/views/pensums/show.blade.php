<x-app-layout>   
    <x-slot name="header">
        Pensum: {{ $pensum->name }}
    </x-slot>

    @livewire('lessons.lessons-index', ['pensum' => $pensum])

    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>