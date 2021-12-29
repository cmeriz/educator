<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="md:py-8">
    
    <div class="md:container flex items-stretch w-full md:w-auto mx-auto">
        
        <div class="navigation-container hidden md:flex items-stretch z-10">
            @livewire('navigation-menu')
        </div>

        <div class="main-container flex flex-col w-full md:rounded-lg">

            <header class="main-header flex flex-wrap justify-between items-center text-secondary-500 md:mb-8">

                <div class="flex justify-between py-2 px-4 md:p-0 bg-primary-500 md:bg-transparent w-full md:w-auto">
                    <a class="logo-mobile block md:hidden text-white" href="{{ route('home') }}">
                        <x-jet-application-mark/>
                    </a>
            
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">

                            <x-jet-dropdown-link href="{{ route('home') }}">
                                Inicio
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('home') }}">
                                Cursos
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('home') }}">
                                Horarios
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('home') }}">
                                Pensums
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                Mi perfil
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Salir
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                @if (isset($header))
                <h1 class="text-2xl w-full md:w-auto mx-8 md:mx-0 mt-12 md:mt-0 font-medium md:order-first">
                    {{ $header }}
                </h1>                
                @endif

            </header>
            
            <main class="main-content grid flex-1">
                {{ $slot }}
            </main>
            
        </div>

    </div>

    @livewireScripts

    <script>
        Livewire.on('alert', function(icon, message){
            Swal.fire({
                position: 'center',
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 1500
            })
        });

        Livewire.on('modelDeleteAttempt', function($object, $event, $title = '¿Estas seguro?', $text = 'Esta acción no puede ser anulada.'){
            Swal.fire({
                title: $title,
                text: $text,
                icon: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                /* confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33', */
                confirmButtonText: 'Borrar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    confirmButton: 'btn--danger m-1',
                    cancelButton: 'btn--gray-outlined m-1',
                }

            }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit($event, $object);
                    }
            });
        });

        </script>

    </script>

</body>
</html>

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html> --}}
