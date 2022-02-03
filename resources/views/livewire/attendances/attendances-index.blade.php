<div x-data="{ open: false }" class="grades-index {{ count($students) > 0 ? 'grid' : 'flex' }} flex-col gap-8 flex-1">

    {{-- Controls --}}
    <div class="flex flex-col lg:flex-row items-center justify-between self-end gap-6 w-full">

        {{-- Input search --}}
            <x-jet-input id="input-search" type="text" wire:model="search" class="input-search w-full lg:w-72" placeholder="Buscar estudiante..."/>

        {{-- Dropdown menu --}}
        <div class="relative z-10 ml-auto mr-0 self-end lg:self-auto">
            <button x-on:click="open = !open" x-on:click.away="open = false" class="p-2 text-secondary-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>
            <div x-show="open" x-transition.opacity class="absolute top-full right-0 flex flex-col rounded-md ring-1 ring-black ring-opacity-5 bg-white shadow-lg">
                <button wire:click="$emit('studentCreate', {{ $course->id }})" class="text-left whitespace-nowrap block px-6 py-3 leading-5 text-secondary-500 hover:bg-secondary-50 focus:outline-none focus:bg-secondary-50 transition">
                    Añadir estudiante
                </button>

                @if (count($students) > 0)
                    <button wire:click="$emit('createClassday')" class="text-left whitespace-nowrap block px-6 py-3 leading-5 text-secondary-500 hover:bg-secondary-50 focus:outline-none focus:bg-secondary-50 transition">
                        Añadir clase
                    </button>
                @endif
                
            </div>
        </div>
        
    </div>

    {{-- Table --}}
    @if (count($students) > 0)

        <div class="overflow-x-scroll">
                
            <table class="attendances-index__table">
                <thead class="text-primary-700 text-xs uppercase">
                    <tr>
                        <th class="sticky left-0 bg-primary-50 text-left font-semibold border-t border-l border-primary-100">
                            Nombre
                        </th>

                        {{-- Classday dates --}}
                        @foreach ($classdays as $classday)
                            <th class="classday-header border-t border-b border-primary-100 bg-primary-100">
                                <span class="classday-header__date h-6 w-16 flex justify-center items-center">{{ $classday->formatted_date }}</span>
                                <x-button wire:click="$emit('modelDeleteAttempt', {{ $classday->id }}, 'deleteClassday', '¿Borrar clase?')" class="classday-header__delete w-16 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                </x-button>
                            </th>
                        @endforeach

                        <th class="border-t border-primary-100 font-bold bg-primary-200 text-primary-800">
                            Promedio
                        </th>

                        <th class="bg-primary-50 border-t border-primary-100"></th>
                        <th class="bg-primary-50 border-t border-r border-primary-100"></th>

                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($students as $student)
                        <tr class="border-l border-r border-primary-100 {{ $loop->last ? 'border-b' : '' }}">

                            {{-- Student name --}}
                            <td class="whitespace-nowrap sticky left-0 bg-white text-secondary-500">
                                <span class="block truncate w-32 sm:w-auto">
                                        {{ $student->fullname }}
                                </span>
                            </td>

                            @php
                                /* Getting student attendances ordered by date */
                                $attendances = null;
                                $attendances = $student->getOrderedStudentAttendances($student->id);
                            @endphp

                            {{-- Attendances --}}
                            @foreach ($attendances as $attendance)
                                <td class="attendance-box bg-primary-50 text-center">
                                    @if ($attendance->attended)
                                        <button wire:click="update({{ $attendance->id }}, false)" class="attendance-box__btn--attended">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="check h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="uncheck h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button> 
                                    @else
                                        <button wire:click="update({{ $attendance->id }}, true)" class="attendance-box__btn--not-attended">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>
                            @endforeach

                            @php
                                /* Getting student's attendance average */
                                $average = $student->getAverageAttendance()->value;
                            @endphp

                            {{-- Attendance Average --}}
                            <td class="text-center bg-primary-100 font-semibold text-base text-primary-800">
                                {{ intval($average) }}%
                            </td>

                            {{-- Status --}}
                            <td class="text-center">
                                <x-badge color="{{ $average >= $student->course->min_attendance ? 'primary' : 'red' }}">
                                    {{ $average >= $student->course->min_attendance ? 'Aprobado' : 'Reprobado' }}
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

