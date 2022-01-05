<div x-data="{ open: false }" class="grades-index {{ count($students) > 0 ? 'grid' : 'flex' }} flex-col gap-4 flex-1">

    <div class="flex flex-col lg:flex-row items-center justify-between self-start gap-4">

        @if (count($students) > 0)
            <x-jet-input id="input-search" type="text" wire:model="search" class="input-search w-full lg:w-72" placeholder="Buscar estudiante..."/>
        @endif
            <div class="relative z-10 ml-auto mr-0 self-end lg:self-auto">
                <button x-on:click="open = !open" x-on:click.away="open = false" class="p-2 text-secondary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
                <div x-show="open" x-transition.opacity class="absolute top-full right-0 flex flex-col rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white shadow-lg">
                    <button wire:click="$emit('studentCreate', {{ $course->id }})" class="text-left whitespace-nowrap block px-4 py-2 leading-5 text-secondary-500 hover:bg-secondary-100 focus:outline-none focus:bg-secondary-100 transition">
                        Añadir estudiante
                    </button>

                    @if (count($students) > 0)
                        <button wire:click="$emit('createClassday')" class="text-left whitespace-nowrap block px-4 py-2 leading-5 text-secondary-500 hover:bg-secondary-100 focus:outline-none focus:bg-secondary-100 transition">
                            Añadir clase
                        </button>
                    @endif
                    
                </div>
            </div>


        
    </div>

    @if (count($students) > 0)
    
        <div class="overflow-x-scroll">
                
            <table class="attendances-index__table">
                <thead class="text-primary-700 text-xs uppercase">
                    <tr>
                        <th class="sm:sticky sm:left-0 bg-primary-50 text-left font-semibold border-t border-l border-primary-100">
                            Nombre
                        </th>

                        @foreach ($classdays as $classday)
                            <th class="border-t border-b border-primary-100 bg-primary-100">
                                {{ $classday->formatted_date }}
                            </th>
                        @endforeach

                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($students as $student)
                        <tr class="border-l border-r border-primary-100 {{ $loop->last ? 'border-b' : '' }}">
                            <td class="whitespace-nowrap sm:sticky sm:left-0 bg-white text-secondary-500">
                                {{ $student->fullname }}
                            </td>

                            @php
                                $attendances = null;
                                $attendances = $student->getOrderedStudentAttendances($student->id);
                            @endphp

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
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    @else

        <p>El curso está vacío... </p>

    @endif

    {{-- @if ($students->hasPages())
        <div class="mt-auto">
            {{ $students->links() }}
        </div>
    @endif --}}

</div>

