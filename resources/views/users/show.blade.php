<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Detalhes do Usuário
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow space-y-4">
            <div class="text-gray-900 dark:text-white">
                <span class="font-semibold">Nome:</span> {{ $usuario->nome }}
            </div>

            <div class="text-gray-900 dark:text-white">
                <span class="font-semibold">Email:</span> {{ $usuario->email }}
            </div>

            <div class="text-gray-900 dark:text-white">
                <span class="font-semibold">Data de Nascimento:</span>
                {{ \Carbon\Carbon::parse($usuario->dt_nasc)->format('d/m/Y') }}
            </div>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}"
                    class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
                    Voltar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
