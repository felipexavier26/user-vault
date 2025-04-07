<x-guest-layout>
    <body data-page="login" 
        @if ($errors->any()) data-has-errors="true" @endif
        @if (session('status')) data-success-message="{{ session('status') }}" @endif
    >

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="dark:text-gray-50" />
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" 
                    autofocus autocomplete="username" placeholder="Digite seu email" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" class="dark:text-gray-50" />
                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password"
                    autocomplete="current-password" placeholder="Digite a sua senha" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm dark:text-gray-50">
                        {{ __('Lembre-me') }}
                    </span>
                </label>

                @if (Route::has('password.request'))
                    <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-between mt-4">
                <div class="mt-4 text-center">
                    <a href="{{ route('register') }}"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800">
                        Ainda não tem uma conta?
                    </a>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-2 text-sm text-gray-300">
                        {{ __('Conecte-se') }}
                    </x-primary-button>
                </div>
            </div>
        </form>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Vite: incluir JS -->
        @vite('resources/js/script.js')

    </body>
</x-guest-layout>
