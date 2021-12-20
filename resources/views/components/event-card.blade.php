<article class="event-card--{{ $color }} py-3 px-6 rounded-lg font-medium">

    <h1>{{ $name }}</h1>
    <div class="flex gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <span>{{ substr($start, 0, 5) . ' - ' . substr($end, 0, 5) }}</span>

    </div>

</article>