<article class="course-card--{{ $color }} flex p-6 rounded-lg transition-all shadow-lg {{ $class }}
                hover:scale-105" >
    <a href="" class="flex flex-col gap-3 flex-1">
            <div class="course-card__name-students flex flex-col sm:flex-row sm:justify-between items-start sm:items-center sm:gap-8">
                <h1 class="font-semibold">
                    {{__($name)}}
                </h1>
                <div class="flex items-center gap-2 font-medium text-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    36
                </div>
            </div>

            <div class="course-card__progressbar w-full h-2 rounded-full relative overflow-hidden transition-colors">
                <div class="progress absolute top-0 left-0 h-2 transition-colors" style="width: 24%;"></div>
            </div>
        <div class="course-card__progress-link flex justify-between items-center mt-auto">
            <span class="text-sm">
                24% completado
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>

    </a>
</article>
