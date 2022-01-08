<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        Curso: {{ $course->name }}
    </x-slot>

    {{-- Content --}}
    <div class="course-grades flex flex-col gap-8 p-8 md:card-shadow w-full md:rounded-lg">

        {{-- Navigation --}}
        <x-courses-navigation course="{{ $course->id }}"/>

        {{-- Grades Section --}}
        @livewire('grades.grades-index', ['course' => $course])

        {{-- Go back button --}}
        <x-button href="{{ route('courses.index') }}" tag="anchor" class="btn--primary-outlined md:hidden md:order-none md:self-end">
                Volver a cursos
        </x-button>

    </div>

    {{-- Scripts --}}
    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>