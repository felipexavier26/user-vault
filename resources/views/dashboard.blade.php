<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-between items-center text-gray-900 dark:text-gray-100">
                    <div class="flex items-center gap-4">
                        <span>Você está logado como {{ Auth::user()->name }}</span>

                        {{-- Imagem de Perfil --}}
                        @if (Auth::user()->profile_image)
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Imagem de perfil"
                                class="w-10 h-10 rounded-full object-cover shadow" />
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                                class="w-10 h-10 rounded-full object-cover shadow" />
                        @endif

                        {{-- Upload de Imagem --}}
                        <form id="upload-form" action="{{ route('users.uploadImage') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="profile_image"
                                onchange="document.getElementById('upload-form').submit()"
                                class="text-sm text-gray-700 file:bg-blue-600 file:text-white file:px-3 file:py-1 file:rounded file:mr-2" />
                        </form>
                    </div>

                    <a href="{{ route('users.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-1 px-3 rounded text-sm">
                        Criar Usuário
                    </a>
                </div>

                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Usuários</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Nome</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $usuario->id }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $usuario->nome }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $usuario->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2">
                                            <a href="{{ route('users.edit', $usuario->id) }}"
                                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded text-sm">
                                                Editar
                                            </a>

                                            <a href="{{ route('users.show', $usuario->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded text-sm">
                                                Visualizar
                                            </a>

                                            <form action="{{ route('users.destroy', $usuario->id) }}" method="POST"
                                                class="form-delete-user">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded text-sm">
                                                    Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
