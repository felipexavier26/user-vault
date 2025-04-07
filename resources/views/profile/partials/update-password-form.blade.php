<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Atualizar senha') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para permanecer segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Senha atual')" class="text-gray-900 dark:text-gray-100" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" placeholder="Senha Atual"/>
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Nova Senha')" class="text-gray-900 dark:text-gray-100" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full" autocomplete="new-password" placeholder="Nova Senha"/>
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirma Senha')" class="text-gray-900 dark:text-gray-100" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" placeholder="Confirmar Senha"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white dark:bg-indigo-500 dark:hover:bg-indigo-400">
                {{ __('Salvar') }}
            </x-primary-button>
        </div>
    </form>
</section>
