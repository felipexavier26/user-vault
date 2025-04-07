<x-guest-layout>
    <body data-page="register" 
        @if ($errors->any()) data-has-errors="true" @endif
        @if (session('status')) data-success-message="{{ session('status') }}" @endif
        data-page="register"
    >
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nome')" class="dark:text-gray-50" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus
                    autocomplete="name" placeholder="Digite seu nome" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="dark:text-gray-50" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autocomplete="username" placeholder="Digite seu email" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" class="dark:text-gray-50" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" placeholder="Digite sua senha" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirma Senha')" class="dark:text-gray-50" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" placeholder="Confirmar senha" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-100 hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Já cadastrado?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Cadastre-se') }}
                </x-primary-button>
            </div>
        </form>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Vite: JS global -->
        @vite('resources/js/script.js')
    </body>
</x-guest-layout>
