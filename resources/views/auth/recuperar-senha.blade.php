<x-guest-layout>

    <body data-page="forgot" @if ($errors->any()) data-has-errors="true" @endif
        @if (session('status')) data-success-message="{{ session('status') }}" @endif>

        <div class="mb-4 text-sm dark:text-gray-50">
            {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e nós lhe enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="dark:text-gray-50" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autofocus placeholder="Digite o email de recuperação" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Link de redefinição de senha de e-mail') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>
