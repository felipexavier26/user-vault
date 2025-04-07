<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuário
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8">
                <form id="form-editar-usuario" action="{{ route('users.update', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nome -->
                    <div class="mb-4">
                        <label for="nome" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                            Nome
                        </label>
                        <input id="nome" type="text" name="nome" value="{{ old('nome', $usuario->nome) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                            Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email', $usuario->email) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Data de Nascimento -->
                    <div class="mb-4">
                        <label for="dt_nasc"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Data de
                            Nascimento</label>
                        <input id="dt_nasc" type="date" name="dt_nasc" value="{{ old('dt_nasc', $usuario->dt_nasc) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Botões -->
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Atualizar
                        </button>
                        <a href="{{ route('users.index') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded shadow inline-block">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
