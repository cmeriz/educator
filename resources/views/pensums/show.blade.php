<x-app-layout>   

    {{-- Header --}}
    <x-slot name="header">
        Pensum: {{ $pensum->name }}
    </x-slot>

    {{-- Content --}}
    @livewire('lessons.lessons-index', ['pensum' => $pensum])

    {{-- Scripts --}}
    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>