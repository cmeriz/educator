<div x-data="{ open: false }" class="courses-index relative flex flex-col gap-8 p-8 md:card-shadow w-full md:rounded-lg">

    {{-- Controls --}}
    <div class="courses-index__controls flex justify-between">
        <x-jet-input id="input-search" type="text" wire:model="search" class="input-search w-9/12 md:w-2/4" placeholder="Buscar curso..."/>
        
        @livewire('courses.course-create')
    </div>

    {{-- Courses Grid --}}
    @if (count($courses) > 0)
        <div class="courses-index__grid relative grid grid-cols-6 gap-8">

            <x-loader/>

            @foreach ($courses as $course)
                <x-course-card :course="$course" class="col-span-6 sm:col-span-3 xl:col-span-2" controls="true"/>
            @endforeach
        </div>

        @if ($courses->hasPages())
            {{-- Pagination --}}
            <div class="courses-index__pagination mt-auto">
                {{ $courses->links() }}
            </div>
        @endif

        @livewire('courses.course-edit')

    @elseif (count($courses) === 0 && $search)

        <p class="self-start">No hay cursos que coincidan con la búsqueda</p>

    @elseif(count($courses) === 0 && !$search)
    
        {{-- No courses --}}
        <div class="flex flex-col md:flex-row md:items-center justify-around gap-4 w-full text-secondary-500">
            <p class="text-2xl font-medium mb-6">
                No tienes cursos. ¡Añadelos!
            </p>
            <img class="mx-auto md:m-0 w-full sm:w-4/5 md:w-80 lg:w-96" src="{{ asset('img/no-courses.svg') }}" alt="No courses">
        </div>


    @endif

    

</div>
