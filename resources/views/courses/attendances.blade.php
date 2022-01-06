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

        @livewire('attendances.attendances-index', ['course' => $course])

    </div>

    @livewire('students.student-create', ['course_id' => $course->id])
    @livewire('students.student-edit')
    @livewire('classdays.classday-create', ['course_id' => $course->id])

    <x-slot name="viewScripts">
        <script defer src="{{ asset('js/default-alert.js') }}"></script>
        <script defer src="{{ asset('js/model-delete-attempt.js') }}"></script>
    </x-slot>

</x-app-layout>