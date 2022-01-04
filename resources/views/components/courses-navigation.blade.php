@php
    $nav_links = [
        [
            'name' => 'Calificaciones',
            'route' => route('courses.grades', $course),
            'isActive' => request()->routeIs('courses.grades'),
        ],
        [
            'name' => 'Asistencias',
            'route' => route('courses.attendances', $course),
            'isActive' => request()->routeIs('courses.attendances'),
        ],
        [
            'name' => 'Pensum',
            'route' => route('courses.pensum', $course),
            'isActive' => request()->routeIs('courses.pensum'),
        ],
    ];
@endphp

<nav>
    <ul>
        @foreach ($nav_links as $link)
            <li class="md:inline-block">
                <a href="{{ $link['route'] }}" class="tab--primary block {{ $link['isActive'] ? 'active' : '' }}">
                    {{ $link['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>