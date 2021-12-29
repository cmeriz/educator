<div x-data="{ open: false }" class="courses-index flex flex-col gap-8 p-8 md:card-shadow w-full md:rounded-lg">
    <div class="courses-index__controls flex justify-between">
        <x-jet-input id="input-search" type="text" wire:model="search" class="input-search w-9/12 md:w-2/4" placeholder="Buscar curso..."/>
        @livewire('courses.course-create')
    </div>
    <div class="courses-index__grid grid grid-cols-6 gap-8">

        @foreach ($courses as $course)
            <x-course-card :course="$course" class="col-span-6 sm:col-span-3 xl:col-span-2" controls="true"/>
        @endforeach
    </div>

    @if ($courses->hasPages())
        <div class="courses-index__pagination mt-auto">
            {{ $courses->links() }}
        </div>
    @endif

    @livewire('courses.course-edit')

</div>
