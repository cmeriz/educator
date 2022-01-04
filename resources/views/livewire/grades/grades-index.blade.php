<div x-data="{ open: false }" class="grades-index {{ count($students) > 0 ? 'grid' : 'flex' }} flex-col gap-4 flex-1">

    <div class="flex items-center justify-between">
        <div class="flex gap-4">
            <x-jet-input id="input-search" type="text" wire:model="search" class="input-search w-72" placeholder="Buscar estudiante..."/>
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

        <div class="relative">
            <button x-on:click="open = !open" x-on:click.away="open = false" class="p-2 text-secondary-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </button>
            <div x-show="open" x-transition.opacity class="absolute top-full right-0 flex flex-col rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white shadow-lg">
                <button wire:click="$emit('studentCreate', {{ $course_id }})" class="text-left whitespace-nowrap block px-4 py-2 leading-5 text-secondary-500 hover:bg-secondary-100 focus:outline-none focus:bg-secondary-100 transition">
                    Añadir estudiante
                </button>

                @if (count($students) > 0)
                    <button wire:click="createActivity(1)" class="text-left whitespace-nowrap block px-4 py-2 leading-5 text-secondary-500 hover:bg-secondary-100 focus:outline-none focus:bg-secondary-100 transition">
                        Añadir deber
                    </button>
                    <button wire:click="createActivity(2)" class="text-left whitespace-nowrap block px-4 py-2 leading-5 text-secondary-500 hover:bg-secondary-100 focus:outline-none focus:bg-secondary-100 transition">
                        Añadir lección
                    </button>
                    <button wire:click="createActivity(3)" class="text-left whitespace-nowrap block px-4 py-2 leading-5 text-secondary-500 hover:bg-secondary-100 focus:outline-none focus:bg-secondary-100 transition">
                        Añadir examen
                    </button>
                @endif
                
            </div>
        </div>
    </div>

    <x-jet-input-error for="grade.value" class="mt-2" />

    @if (count($students) > 0)
    
        <div class="overflow-x-scroll">
                
            <table class="grades-index__table">
                <thead class="text-primary-700 text-xs uppercase">
                    <tr>
                        <th></th>
                        @if (count($homeworks) > 0 && ($type_filter == 'all' || $type_filter == 'homeworks'))
                            <th class="bg-primary-100 font-semibold" colspan="{{ count($homeworks) }}">
                                Deberes
                            </th>
                        @endif
                        
                        @if (count($lessons) > 0 && ($type_filter == 'all' || $type_filter == 'lessons'))
                            <th class="bg-primary-50 font-semibold" colspan="{{ count($lessons) }}">
                                Lecciones
                            </th>
                        @endif

                        @if (count($exams) > 0 && ($type_filter == 'all' || $type_filter == 'exams'))
                            <th class="bg-primary-100 font-semibold" colspan="{{ count($exams) }}">
                                Examenes
                            </th>
                        @endif

                        @if ($type_filter == 'all')
                            <th></th>
                        @endif
                        <th></th>
                    </tr>
                    <tr>
                        <th class="bg-primary-50 text-left font-semibold border-t border-l border-primary-100">Nombre</th>
                        
                        @if (count($homeworks) > 0 && ($type_filter == 'all' || $type_filter == 'homeworks'))
                            @foreach ($homeworks as $homework)
                                <th class="border-t border-b border-primary-100 bg-primary-100">
                                    {{ $loop->iteration }}
                                </th>
                            @endforeach
                        @endif

                        @if (count($lessons) > 0 && ($type_filter == 'all' || $type_filter == 'lessons'))
                            @foreach ($lessons as $lesson)
                                <th class="border-t border-b border-primary-100 bg-primary-50">
                                    {{ $loop->iteration }}
                                </th>
                            @endforeach
                        @endif

                        @if (count($exams) > 0 && ($type_filter == 'all' || $type_filter == 'exams'))
                            @foreach ($exams as $exam)
                                <th class="border-t border-b border-primary-100 bg-primary-100">
                                    {{ $loop->iteration }}
                                </th>
                            @endforeach
                        @endif

                        @if ($type_filter == 'all')
                            <th class="border-t border-primary-100 font-semibold bg-primary-50">
                                Promedio
                            </th>
                        @endif
                        <th class="border-t border-r border-primary-100 font-semibold bg-primary-50">
                            Estado
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($students as $student)
                        <tr class="border-l border-r border-primary-100 {{ $loop->last ? 'border-b' : '' }}">
                            <td class="whitespace-nowrap">
                                {{ $student->lastname }} {{ $student->firstname }}
                            </td>
                            
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

                            @if ($type_filter == 'all')
                                <td class="text-center">
                                    {{ $average }}
                                </td>
                            @endif
                            <td class="text-center">
                                <x-badge color="{{ $average >= $student->course->min_grade ? 'primary' : 'red' }}">
                                    {{ $average >= $student->course->min_grade ? 'Aprobado' : 'Reprobado' }}
                                </x-badge>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    @else

        <p>No existe ningún estudiante...</p>

    @endif

    @if ($students->hasPages())
        <div class="mt-auto">
            {{ $students->links() }}
        </div>
    @endif

    @livewire('students.student-create', ['course_id' => $course_id])

</div>
