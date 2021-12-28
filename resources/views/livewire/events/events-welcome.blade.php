<div x-init="day = (new Date().toLocaleDateString('en-US', {weekday: 'long'})).toLowerCase()" x-data="{ day: @entangle('day') }" class="home__schedule self-start col-span-12 ml:col-span-6 xl:col-span-4 flex flex-col gap-8 p-8 md:card-shadow md:rounded-lg">
    <h3 class="font-bold text-2xl">Clases de hoy</h3>
    <div class="flex flex-col gap-8">
        @foreach ($events as $event)

            <x-event-card :event="$event"/>

        @endforeach
    </div>
    <x-button tag="anchor" class="btn--primary inline-block ml-auto mr-0">Ver horario</x-button>
</div>
