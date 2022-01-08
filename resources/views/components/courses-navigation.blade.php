@php
    $nav_links = [
        [
            'name' => 'Calificaciones',
            'route' => route('courses.grades', $course),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                       </svg>',
            'isActive' => request()->routeIs('courses.grades'),
        ],
        [
            'name' => 'Asistencias',
            'route' => route('courses.attendances', $course),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                       </svg>',
            'isActive' => request()->routeIs('courses.attendances'),
        ],
        [
            'name' => 'Pensum',
            'route' => route('courses.pensum', $course),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                       </svg>',
            'isActive' => request()->routeIs('courses.pensum'),
        ],
    ];
@endphp

<div class="courses__controls flex gap-4 md:items-start justify-between">
    <nav>
        <ul>
            @foreach ($nav_links as $link)
                <li class="inline-block">
                    <a href="{{ $link['route'] }}" class="tab--primary block {{ $link['isActive'] ? 'active' : '' }}">
                        <span>{{ $link['name'] }}</span>
                        {!! $link['icon'] !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <x-button href="{{ route('courses.index') }}" tag="anchor" class="btn--primary-outlined hidden md:block md:self-end">
        Volver a cursos
    </x-button>
</div>

