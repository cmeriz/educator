<div x-init="document.getElementById(`${day}-label`).scrollIntoView({ block: 'start', });" 
    x-data="{day: (new Date().toLocaleDateString('en-US', {weekday: 'long'})).toLowerCase()}"
    class="events-index relative grid flex-col text-secondary-500 gap-8 p-8 md:card-shadow w-full md:rounded-lg">
    
    @livewire('events.event-create')

    <div class="grid overflow-x-scroll pb-8">
        <table>
            <thead>
                <tr class="border-b border-b-secondary-100">
                    <th id="monday-label" width="14%" class="text-left">
                        <span class="block mb-1 uppercase">Lunes</span>
                        <span class="block mb-6">{{ count($eventsByDay['monday']) }} clases</span>                    
                    </th>
                    <th id="tuesday-label" width="14%" class="text-left">
                        <span class="block mb-1 uppercase">Martes</span>
                        <span class="block mb-6">{{ count($eventsByDay['tuesday']) }} clases</span>                    
                    </th>
                    <th id="wednesday-label" width="14%" class="text-left">
                        <span class="block mb-1 uppercase">Miércoles</span>
                        <span class="block mb-6">{{ count($eventsByDay['wednesday']) }} clases</span>                    
                    </th>
                    <th id="thursday-label"  width="14%" class="text-left">
                        <span class="block mb-1 uppercase">Jueves</span>
                        <span class="block mb-6">{{ count($eventsByDay['thursday']) }} clases</span>                    
                    </th>
                    <th id="friday-label" width="14%" class="text-left">
                        <span class="block mb-1 uppercase">Viernes</span>
                        <span class="block mb-6">{{ count($eventsByDay['friday']) }} clases</span>                    
                    </th>
                    <th id="saturday-label" width="14%" class="text-left">
                        <span class="block mb-1 uppercase">Sábado</span>
                        <span class="block mb-6">{{ count($eventsByDay['saturday']) }} clases</span>                    
                    </th>
                    <th id="sunday-label" width="14%" class="text-left">
                        <span class="block mb-1 uppercase">Domingo</span>
                        <span class="block mb-6">{{ count($eventsByDay['sunday']) }} clases</span>                    
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>

                    @foreach ($eventsByDay as $eventInDay)
                        <td class="align-top">
                            @foreach ($eventInDay as $event)
                                <x-event-card 
                                    x-bind:class="day !== '{{ $event->day }}' ? 'not-active' : ''"
                                    :event="$event"
                                    class="mt-8"
                                    controls="true"
                                />
                            @endforeach
                        </td>
                    @endforeach
                </tr>
            </tbody>

        </table>
    </div>
    

</div>
