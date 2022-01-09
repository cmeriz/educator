<x-guest-layout>

    <div class="guest__welcome col-span-2 lg:col-span-1">
        <div class="flex flex-col justify-center py-28 px-10 lg:px-16 mr-0 ml-0 lg:ml-auto text-white">
            <h1 class="text-3xl sm:text-5xl font-semibold mb-6">
                ¡Bienvenido!
            </h1>
            <p class="mb-5">
                eDUCATOR es una plataforma de gestión educativa. Administra calificaciones, 
                asistencias, mantén un control de avance de tus contenidos y configura un horario
                de clases para estar siempre al día. ¡Accede con una cuenta de prueba o regístrate!
            </p>
            <div class="flex gap-4 justify-center lg:justify-start flex-wrap">
                <x-button tag="button" onclick="testLogin()" class="btn--white-outlined">
                    Cuenta de prueba
                </x-button>
                <x-button tag="anchor" href="{{ route('register') }}" class="btn--white">
                    Registrarse
                </x-button>
            </div>
        </div>
    </div>

    <x-jet-authentication-card>    
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form id="login-form" method="POST" action="{{ route('login') }}" class="text-left">
            @csrf

            <div>
                <x-jet-label for="email" value="Correo" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="usuario@email.com"  name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="********" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </label>
            </div>

            <div class="flex flex-col lg:flex-row items-center justify-end gap-4 mt-4">
                
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-blue-600 hover:text-blue-900 mb-6 md:mb-0 w-full" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <div class="flex flex-col md:flex-row gap-4 justify-end w-full lg:w-auto">
                    <x-button tag="button" type="button" onclick="testLogin()" class="btn--primary-outlined lg:hidden whitespace-nowrap">
                        Cuenta de prueba
                    </x-button>

                    <x-button tag="button" type="submit" class="btn--primary w-full xs:w-auto">
                        Acceder
                    </x-button>
                </div>
            </div>
            
        </form>
        <footer class="mt-14 text-right">
            &copy{{ date('Y') }} eDUCATOR. Desarrollado por 
            <a class="text-blue-600 underline" href="https://cmeriz.com/" target="_blank" rel="noopener">
                @cmeriz
            </a>
        </footer>
    </x-jet-authentication-card>

    <script>

        function testLogin(){
            const inputEmail = document.querySelector('#email');
            const inputPassword = document.querySelector('#password');
            const form = document.querySelector('#login-form');
            inputEmail.value = 'john_doe@mail.com';
            inputPassword.value = 'O2:Y|MNBKy4k';    
            form.submit();       
        }        

    </script>

</x-guest-layout>
