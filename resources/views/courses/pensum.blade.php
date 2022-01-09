<x-app-layout>

    {{-- Title --}}
    <x-slot name="title">
        eDUCATOR - Curso: {{ $course->name }} - Pensum
    </x-slot>

    {{-- Header --}}
    <x-slot name="header">
        Curso: {{ $course->name }}
    </x-slot>

    {{-- Content --}}
    <div class="course-grades flex flex-col gap-8 p-8 md:card-shadow w-full md:rounded-lg">

        {{-- Navigation --}}
        <x-courses-navigation course="{{ $course->id }}"/>

        {{-- Pensum Section --}}
        @livewire('pensums.pensum-progress', ['course' => $course])

        {{-- Buttons --}}
        <div class="flex flex-col gap-4">
            <x-button wire:click="$emit('modelDeleteAttempt', null, 'pensumRemove', '¿Remover pensum?')" class="btn--danger block md:hidden whitespace-nowrap">
                Remover pensum
            </x-button>  

            <x-button href="{{ route('courses.index') }}" tag="anchor" class="btn--primary-outlined md:hidden md:order-none md:self-end">
                    Volver a cursos
            </x-button>
        </div>

    </div>

    {{-- Scripts --}}
    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>