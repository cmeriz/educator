@php
    
    $nav_links = [
        [
            'name' => 'Inicio',
            'route' => route('home'),
            'isActive' => request()->routeIs('home'),
            'icon' =>'
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            ',
        ],
        [
            'name' => 'Cursos',
            'route' => route('courses.index'),
            'isActive' => request()->routeIs('courses.*'),
            'icon' =>'
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            ',
        ],
        [
            'name' => 'Horario',
            'route' => route('events.index'),
            'isActive' => request()->routeIs('events.index'),
            'icon' =>'
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            ',
        ],
        [
            'name' => 'Pensums',
            'route' => route('pensums.index'),
            'isActive' => request()->routeIs('pensums.index', 'pensums.show'),
            'icon' =>'
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            ',
        ],
        [
            'name' => 'Mi perfil',
            'route' => route('profile.show'),
            'isActive' => request()->routeIs('profile.show'),
            'icon' =>'
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            ',
        ],
    ];

@endphp


<nav class="navigation flex items-stretch">
    {{-- Primary Navigation Menu --}}
    <div class="nav-desktop flex flex-col items-center text-center font-medium text-sm px-8 py-8 my-8 rounded-lg">
        {{-- Logo --}}
        <a class="logo block text-white mb-10" href="{{ route('home') }}">
            <x-jet-application-mark/>
        </a>

        {{-- Menu --}}
        <ul class="menu">
            @foreach ($nav_links as $nav_link)
                <li class="menu-item mb-6">
                    <a href="{{ $nav_link['route'] }}" class="block text-white {{ $nav_link['isActive'] ? 'opacity-100' : 'opacity-40' }} hover:opacity-100 transition-opacity">
                        <div class="menu-item__icon mb-1">
                            {!! $nav_link['icon'] !!}
                        </div>
                        <span class="menu-item__label whitespace-nowrap">
                            {{ $nav_link['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach

            <li class="menu-item">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <a href="{{ route('logout') }}" class="block text-white opacity-40 hover:opacity-100 transition-opacity"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        <div class="menu-item__icon mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <span class="menu-item__label whitespace-nowrap">
                            Salir
                        </span>
                    </a>
                </form>

            </li>

        </ul>  
    </div>

</nav>