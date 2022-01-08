<div x-data="{ open: false }" class="grades-index {{ count($students) > 0 ? 'grid' : 'flex' }} flex-col gap-4">

    {{-- Controls --}}
    <div class="flex flex-col lg:flex-row items-center justify-between self-start gap-6 w-full">

        <div class="flex flex-col lg:flex-row gap-4 w-full lg:w-auto">
            <x-jet-input id="input-search" type="text" wire:model="search" class="input-search w-full lg:w-72" placeholder="Buscar estudiante..."/>
            <select wire:model="type_filter" class="flex-1 border-secondary-100 {{ $type_filter != 'all' ? 'text-secondary-500' : 'text-secondary-300' }} focus:border-secondary-100 bg-secondary-50 placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                <option value="all" class="text-secondary-500 bg-white">
                    Todas las actividades
                </option>
                @if (count($homeworks) > 0)
                    <option value="homeworks" class="text-secondary-500 bg-white">
                        Solo Deberes
                    </option>
                @endif
                
                @if (count($lessons) > 0)
                    <option value="lessons" class="text-secondary-500 bg-white">
                        Solo Lecciones
                    </option>
                @endif

                @if (count($exams) > 0)
                    <option value="exams" class="text-secondary-500 bg-white">
                        Solo Examenes
                    </option>
                @endif
            </select>
        </div>

        

        <div class="relative z-10 ml-auto mr-0 self-end lg:self-auto">
            <button x-on:click="open = !open" x-on:click.away="open = false" class="p-2 text-secondary-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>
            <div x-show="open" x-transition.opacity class="absolute top-full right-0 flex flex-col text-base rounded-md ring-1 ring-black ring-opacity-5 bg-white shadow-lg">
                <button wire:click="$emit('studentCreate', {{ $course->id }})" class="text-left whitespace-nowrap block px-6 py-3 leading-5 text-secondary-500 hover:bg-secondary-50 focus:outline-none focus:bg-secondary-50 transition">
                    Añadir estudiante
                </button>

                @if (count($students) > 0)
                    <button wire:click="createActivity(1)" class="text-left whitespace-nowrap block px-6 py-3 leading-5 text-secondary-500 hover:bg-secondary-50 focus:outline-none focus:bg-secondary-50 transition">
                        Añadir deber
                    </button>
                    <button wire:click="createActivity(2)" class="text-left whitespace-nowrap block px-6 py-3 leading-5 text-secondary-500 hover:bg-secondary-50 focus:outline-none focus:bg-secondary-50 transition">
                        Añadir lección
                    </button>
                    <button wire:click="createActivity(3)" class="text-left whitespace-nowrap block px-6 py-3 leading-5 text-secondary-500 hover:bg-secondary-50 focus:outline-none focus:bg-secondary-50 transition">
                        Añadir examen
                    </button>
                @endif
                
            </div>
        </div>        
    </div>

    @if (count($students) > 0)
    
        <x-jet-input-error for="grade.value" class="mt-2"/>

        {{-- Table --}}
        <div class="overflow-x-scroll mt-4 relative">
        
            <x-loader/>

            <table class="grades-index__table">
                <thead class="text-primary-700 text-xs uppercase">
                    <tr>
                        <th class="sm:sticky sm:left-0 bg-white"></th>
                        
                        {{-- Homeworks --}}
                        @if (count($homeworks) > 0 && ($type_filter == 'all' || $type_filter == 'homeworks'))
                            <th class="bg-primary-100 font-semibold" colspan="{{ count($homeworks) }}">
                                Deberes
                                <br>
                                ({{ $course->homeworks_weight }}%)
                            </th>
                        @endif
                        
                        {{-- Lessons --}}
                        @if (count($lessons) > 0 && ($type_filter == 'all' || $type_filter == 'lessons'))
                            <th class="bg-primary-50 font-semibold" colspan="{{ count($lessons) }}">
                                Lecciones
                                <br>
                                ({{ $course->lessons_weight }}%)
                            </th>
                        @endif
                        
                        {{-- Exams --}}
                        @if (count($exams) > 0 && ($type_filter == 'all' || $type_filter == 'exams'))
                            <th class="bg-primary-100 font-semibold" colspan="{{ count($exams) }}">
                                Examenes
                                <br>
                                ({{ $course->exams_weight }}%)
                            </th>
                        @endif

                        @if ($type_filter == 'all')
                            <th></th>
                        @endif
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        {{-- Name --}}
                        <th class="sm:sticky sm:left-0 bg-primary-50 text-left font-semibold border-t border-l border-primary-100">
                            Nombre
                        </th>
                        
                        {{-- Homework number --}}
                        @if (count($homeworks) > 0 && ($type_filter == 'all' || $type_filter == 'homeworks'))
                            @foreach ($homeworks as $homework)
                                <th class="border-t border-b border-primary-100 bg-primary-100">
                                    <div class="activity-header flex justify-center items-center">
                                        <span class="activity-header__number h-6 w-6 flex justify-center items-center">
                                            {{ $loop->iteration }}
                                        </span>
                                        <x-button wire:click="$emit('modelDeleteAttempt', {{ $homework->id }}, 'deleteActivity', '¿Borrar actividad?')" class="activity-header__delete text-red-500 w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                              </svg>
                                        </x-button>
                                    </div>
                                </th>
                            @endforeach
                        @endif

                        {{-- Lesson number --}}
                        @if (count($lessons) > 0 && ($type_filter == 'all' || $type_filter == 'lessons'))
                            @foreach ($lessons as $lesson)
                                <th class="border-t border-b border-primary-100 bg-primary-50">
                                    <div class="activity-header flex justify-center items-center">
                                        <span class="activity-header__number h-6 w-6 flex justify-center items-center">
                                            {{ $loop->iteration }}
                                        </span>
                                        <x-button wire:click="$emit('modelDeleteAttempt', {{ $lesson->id }}, 'deleteActivity', '¿Borrar actividad?')" class="activity-header__delete text-red-500 w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                              </svg>
                                        </x-button>
                                    </div>
                                </th>
                            @endforeach
                        @endif

                        {{-- Exam number --}}
                        @if (count($exams) > 0 && ($type_filter == 'all' || $type_filter == 'exams'))
                            @foreach ($exams as $exam)
                                <th class="border-t border-b border-primary-100 bg-primary-100">
                                    <div class="activity-header flex justify-center items-center">
                                        <span class="activity-header__number h-6 w-6 flex justify-center items-center">
                                            {{ $loop->iteration }}
                                        </span>
                                        <x-button wire:click="$emit('modelDeleteAttempt', {{ $exam->id }}, 'deleteActivity', '¿Borrar actividad?')" class="activity-header__delete text-red-500 w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                              </svg>
                                        </x-button>
                                    </div>
                                </th>
                            @endforeach
                        @endif

                        {{-- Average --}}
                        @if ($type_filter == 'all')
                            <th class="border-t border-primary-100 font-bold bg-primary-200 text-primary-800">
                                Promedio
                            </th>
                        @endif

                        {{-- Status --}}
                        <th class="border-t border-primary-100 font-semibold bg-primary-50">
                            Estado
                        </th>
                        <th class="border-t border-r border-primary-100 bg-primary-50"></th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($students as $student)
                        <tr class="border-l border-r border-primary-100 {{ $loop->last ? 'border-b' : '' }}">
                            
                            {{-- Student name --}}
                            <td class="whitespace-nowrap sm:sticky sm:left-0 bg-white">
                                {{ $student->fullname }}
                            </td>
                            
                            {{-- Homeworks grades --}}
                            @if ($type_filter == 'all' || $type_filter == 'homeworks')
                                @foreach ($homeworks as $homework)
                                    <td width="60px" class="bg-primary-50 text-center">
                                        @php
                                            $currentGrade = $student->getActivityGrade($homework->id);
                                        @endphp

                                        @if ($grade->id == $currentGrade->id)
                                            <form wire:submit.prevent="update">
                                                <input id="input-grade" wire:model="grade.value" step="0.1" type="number" class="w-20 text-sm border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-white placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                                            </form>
                                        @else
                                            <button wire:click="edit({{ $currentGrade }})">
                                                {{ $currentGrade->value }}
                                            </button>
                                        @endif                            
                                    </td>
                                @endforeach
                            @endif

                            {{-- Lessons grades --}}
                            @if ($type_filter == 'all' || $type_filter == 'lessons')
                                @foreach ($lessons as $lesson)
                                    <td width="60px" class="text-center">
                                        @php
                                            $currentGrade = $student->getActivityGrade($lesson->id);
                                        @endphp

                                        @if ($grade->id == $currentGrade->id)
                                            <form wire:submit.prevent="update">
                                                <input id="input-grade" wire:model="grade.value" step="0.1" type="number" class="w-20 text-sm border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-white placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                                            </form>
                                        @else
                                            <button wire:click="edit({{ $currentGrade }})">
                                                {{ $currentGrade->value }}
                                            </button>
                                        @endif                            
                                    </td>
                                @endforeach
                            @endif

                            {{-- Exams grades --}}
                            @if ($type_filter == 'all' || $type_filter == 'exams')
                                @foreach ($exams as $exam)
                                    <td width="60px" class="bg-primary-50 text-center">
                                        @php
                                            $currentGrade = $student->getActivityGrade($exam->id);
                                        @endphp

                                        @if ($grade->id == $currentGrade->id)
                                            <form wire:submit.prevent="update">
                                                <input id="input-grade" wire:model="grade.value" step="0.1" type="number" class="w-20 text-sm border-secondary-100 text-secondary-500 focus:border-secondary-100 bg-white placeholder:text-secondary-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg">
                                            </form>
                                        @else
                                            <button wire:click="edit({{ $currentGrade }})">
                                                {{ $currentGrade->value }}
                                            </button>
                                        @endif                            
                                    </td>
                                @endforeach
                            @endif
                            
                            @php
                                $average = $student->getAverageGrade()->value;
                            @endphp

                            {{-- Average --}}
                            @if ($type_filter == 'all')
                                <td class="text-center bg-primary-100 font-semibold text-base text-primary-800">
                                    {{ $average }}
                                </td>
                            @endif

                            {{-- Status --}}
                            <td class="text-center">
                                <x-badge color="{{ $average >= $student->course->min_grade ? 'primary' : 'red' }}">
                                    {{ $average >= $student->course->min_grade ? 'Aprobado' : 'Reprobado' }}
                                </x-badge>
                            </td>

                            {{-- Actions --}}
                            <td>
                                <div class="flex gap-2">
                                    {{-- Edit Button --}}
                                    <x-button wire:click="$emit('studentEdit', {{ $student->id }})" class="bg-blue-100 text-blue-500 hover:scale-105 transition-all p-2 rounded-lg self-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </x-button>

                                    {{-- Delete Button --}}
                                    <x-button wire:click="$emit('modelDeleteAttempt', {{ $student->id }}, 'deleteStudent', '¿Borrar estudiante?')" class="bg-red-100 text-red-500 hover:scale-105 transition-all p-2 rounded-lg self-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </x-button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        @if ($students->hasPages())
            {{-- Pagination --}}
            <div class="mt-auto">
                {{ $students->links() }}
            </div>
        @endif

        @livewire('students.student-create', ['course_id' => $course->id])
        @livewire('students.student-edit')

    @elseif (count($students) === 0 && $search)

        <p class="self-start">No hay estudiantes que coincidan con la búsqueda</p>

    @elseif(count($students) === 0 && !$search)
        {{-- No students --}}
        <div class="flex flex-col md:flex-row md:items-center justify-around gap-4 w-full text-secondary-500">
            <p class="text-2xl font-medium mb-6">
                Este curso no tiene estudiantes. ¡Añadelos!
            </p>
            <img class="mx-auto md:m-0 w-full sm:w-4/5 md:w-80 lg:w-96" src="{{ asset('img/no-students.svg') }}" alt="No students">
        </div>

    @endif    

</div>
