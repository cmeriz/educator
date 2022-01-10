<div
    @if ($eventsByDay != [])
        x-init="document.getElementById(`${day}-label`).scrollIntoView({ block: 'start', });" 
        x-data="{
                    day: (new Date().toLocaleDateString('en-US', {weekday: 'long'})).toLowerCase(),
                    inputNameCreate: document.querySelector('#create-input-course'),
                }"
    @endif

    class="events-index relative grid flex-col text-secondary-500 gap-8 p-8 md:card-shadow w-full md:rounded-lg"
>

    <x-loader/>

    {{-- Create button --}}
    <x-button class="btn--icon--primary absolute right-8 top-8 z-20" wire:click="$emit('eventCreate')" x-on:click="setTimeout( () => inputNameCreate.focus(), 500 );">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </x-button>
    @livewire('events.event-create', [], key('event-create'))

    {{-- Events Grid --}}
    @if ($eventsByDay != [])

        <div class="grid overflow-scroll pb-8 max-h-[32rem]">        
            <table>
                <thead>
                    <tr class="sticky z-10 top-0 bg-white shadow-sm">
                        <th id="monday-label" width="14%" class="text-left">
                            <span class="block mb-1 uppercase">
                                Lunes
                            </span>
                            <span class="block mb-6">
                                {{ !is_null($eventsByDay['monday']) ? count($eventsByDay['monday']) : '0' }} clases
                            </span>                    
                        </th>
                        <th id="tuesday-label" width="14%" class="text-left">
                            <span class="block mb-1 uppercase">
                                Martes
                            </span>
                            <span class="block mb-6">
                                {{ !is_null($eventsByDay['tuesday']) ? count($eventsByDay['tuesday']) : '0' }} clases
                            </span>                    
                        </th>
                        <th id="wednesday-label" width="14%" class="text-left">
                            <span class="block mb-1 uppercase">
                                Miércoles
                            </span>
                            <span class="block mb-6">
                                {{ !is_null($eventsByDay['wednesday']) ? count($eventsByDay['wednesday']) : '0' }} clases
                            </span>                    
                        </th>
                        <th id="thursday-label"  width="14%" class="text-left">
                            <span class="block mb-1 uppercase">
                                Jueves
                            </span>
                            <span class="block mb-6">
                                {{ !is_null($eventsByDay['thursday']) ? count($eventsByDay['thursday']) : '0' }} clases
                            </span>                    
                        </th>
                        <th id="friday-label" width="14%" class="text-left">
                            <span class="block mb-1 uppercase">
                                Viernes
                            </span>
                            <span class="block mb-6">
                                {{ !is_null($eventsByDay['friday']) ? count($eventsByDay['friday']) : '0' }} clases
                            </span>                    
                        </th>
                        <th id="saturday-label" width="14%" class="text-left">
                            <span class="block mb-1 uppercase">
                                Sábado
                            </span>
                            <span class="block mb-6">
                                {{ !is_null($eventsByDay['saturday']) ? count($eventsByDay['saturday']) : '0' }} clases
                            </span>                    
                        </th>
                        <th id="sunday-label" width="14%" class="text-left">
                            <span class="block mb-1 uppercase">
                                Domingo
                            </span>
                            <span class="block mb-6">
                                {{ !is_null($eventsByDay['sunday']) ? count($eventsByDay['sunday']) : '0' }} clases
                            </span>                    
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($eventsByDay as $eventInDay)
                            {{-- Event --}}
                            <td class="align-top">
                                @if (!is_null($eventInDay))
                                    @foreach ($eventInDay as $event)
                                        <x-event-card 
                                            x-bind:class="day !== '{{ $event->day }}' ? 'not-active' : ''"
                                            :event="$event"
                                            class="mt-8"
                                            controls="true"
                                        />
                                    @endforeach
                                @endif
                            </td>
                        @endforeach
                    </tr>
                </tbody>

            </table>        
        </div>

     @else

        {{-- No events --}}
        <div class="flex flex-col md:flex-row md:items-center justify-around gap-4 w-full text-secondary-500 mt-16">
            <p class="text-2xl font-medium mb-6">
                Tu horario está vacío. ¡Añade tus clases!
            </p>
            <img class="mx-auto md:m-0 w-full sm:w-4/5 md:w-80 lg:w-96" src="{{ asset('img/no-events.svg') }}" alt="No events">
        </div>

    @endif

    @livewire('events.event-edit', [], key('event-edit'))

</div>
