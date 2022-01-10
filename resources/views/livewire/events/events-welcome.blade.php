<div x-init="day = (new Date().toLocaleDateString('en-US', {weekday: 'long'})).toLowerCase()" x-data="{ day: @entangle('day') }" class="home__schedule relative self-start col-span-12 ml:col-span-6 xl:col-span-4 flex flex-col gap-8 p-8 md:card-shadow md:rounded-lg">
    
    <x-loader/>
    
    {{-- Title --}}
    <h3 class="font-bold text-2xl">Clases de hoy</h3>

    {{-- Event grid --}}
    <div class="flex flex-col gap-8">
        @forelse ($events as $event)
            {{-- Event --}}
            <x-event-card :event="$event"/>
        @empty
            {{-- No events --}}
            <p>¡Hoy no tienes clases!</p>    
            <img class="w-3/5 lg:w-4/5 mx-auto" src="{{ asset('img/no-classes-today.svg') }}" alt="No classes today">

        @endforelse
    </div>

    {{-- Schedule Button --}}
    <x-button tag="anchor" href="{{ route('events.index') }}" class="btn--primary block sm:inline-block sm:ml-auto sm:mr-0">
        Ver horario
    </x-button>
</div>
