<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    @livewireStyles

    <title>{{ $title ?? 'eDUCATOR' }}</title>    

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="md:py-8">
    
    <div class="md:container flex items-stretch w-full md:w-auto mx-auto">
        
        {{-- Main Navigation --}}
        <div class="navigation-container hidden md:flex items-stretch z-10">
            @livewire('navigation-menu')
        </div>

        {{-- Main Container --}}
        <div class="main-container flex flex-col w-full md:rounded-lg card-shadow">

            {{-- Header --}}
            <header class="main-header flex flex-wrap md:flex-nowrap justify-between items-center text-secondary-500 md:mb-8">

                <div class="fixed top-0 md:relative flex items-center bg-white shadow-sm md:shadow-none  justify-end py-2 px-8 md:p-0 w-full md:w-56 z-30">
                    <a class="logo-mobile absolute left-8 md:hidden text-white z-20" href="{{ route('home') }}">
                        <x-jet-application-logo class="w-36" />
                    </a>
            
                    <div x-data="{ open: false }" class="menu-mobile relative w-full">
                        <div class="menu-mobile__trigger py-2 w-full">
                            <button x-on:click="open = !open" x-on:click.away="open = false" class="flex mr-0 ml-auto text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </div>
                        <nav x-show="open" x-transition.scale.origin.top.right class="menu-mobile__dropdown absolute overflow-hidden left-0 right-0 top-full w-full bg-white rounded-lg shadow-lg z-10">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}" class="block px-6 py-3 hover:bg-secondary-50">
                                        Inicio
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('courses.index') }}" class="block px-6 py-3 hover:bg-secondary-50">
                                        Cursos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('events.index') }}" class="block px-6 py-3 hover:bg-secondary-50">
                                        Horario
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('pensums.index') }}" class="block px-6 py-3 hover:bg-secondary-50">
                                        Pensums
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.show') }}" class="block px-6 py-3 hover:bg-secondary-50">
                                        Mi cuenta
                                    </a>
                                </li>
                                <li class="border-t border-secondary-50">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           this.closest('form').submit();" class="block px-6 py-3 hover:bg-secondary-50">
                                           Salir
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                @if (isset($header))
                <h1 class="text-2xl w-full md:w-auto mx-8 md:mx-0 mt-32 md:mt-0 font-medium md:order-first">
                    {{ $header }}
                </h1>                
                @endif

            </header>
            
            {{-- Main Content --}}
            <main class="main-content grid flex-1">
                {{ $slot }}
            </main>
            
        </div>

    </div>

    {{-- Scripts --}}
    @livewireScripts

    @isset($viewScripts)
        {{ $viewScripts }}
    @endisset

</body>
</html>