<x-app-layout>   
    <x-slot name="header">
        Pensum: {{ $pensum->name }}
    </x-slot>

    @livewire('lessons.lessons-index', ['pensum' => $pensum])

</x-app-layout>