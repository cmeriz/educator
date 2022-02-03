<x-app-layout>

    {{-- Title --}}
    <x-slot name="title">
        eDUCATOR - Inicio
    </x-slot>

    {{-- Header --}}
    <x-slot name="header">
        {{ 'Bienvenido, ' . explode(' ', Auth::user()->name)[0] }}
    </x-slot>

    <div class="home grid grid-cols-12 md:gap-8 text-secondary-500">
        
        {{-- My courses --}}
        <div class="home__courses self-start col-span-12 ml:col-span-6 xl:col-span-8 p-8 flex flex-col gap-8 md:card-shadow md:rounded-lg">
            <h3 class="font-bold text-2xl">
                Mis cursos
            </h3>
            <div class="grid grid grid-cols-6 gap-8">
                @forelse ($courses as $course)
                    {{-- Course --}}
                    <x-course-card :course="$course" class="col-span-6 sm:col-span-3 ml:col-span-6 xl:col-span-3" />
                @empty

                    {{-- No courses --}}
                    <p class="col-span-2">No tienes cursos. Vé a la sección de cursos para crearlos</p>

                    <img class="col-span-2 w-4/5 sm:w-3/5 md:w-4/5 xl:w-1/2 mx-auto" src="{{ asset('img/no-courses.svg') }}" alt="">

                @endforelse
            </div>
            
            {{-- Courses button --}}
            <x-button tag="anchor" href="{{ route('courses.index') }}" class="btn--primary block sm:inline-block sm:ml-auto sm:mr-0">Ver cursos</x-button>
        </div>
        
        {{-- My classes --}}
        @livewire('events.events-welcome')

    </div>

</x-app-layout>