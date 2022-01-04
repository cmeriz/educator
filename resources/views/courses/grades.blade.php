<x-app-layout>
    <x-slot name="header">
        Curso: {{ $course->name }}
    </x-slot>

    <div class="course-grades flex flex-col gap-8 p-8 md:card-shadow w-full md:rounded-lg">

        <div class="courses-grades__controls flex justify-between">
            <x-courses-navigation course="{{ $course->id }}"/>

            <x-button href="{{ route('courses.index') }}" tag="anchor" class="btn--primary-outlined">
                Volver a cursos
            </x-button>
        </div>

        @livewire('grades.grades-index', ['course_id' => $course->id])

    </div>

    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>