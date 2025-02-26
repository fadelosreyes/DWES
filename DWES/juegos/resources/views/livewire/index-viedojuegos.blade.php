<div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3 text-center">titulo</th>
                                    <th class="px-6 py-3 text-center">anyo</th>
                                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('desarrolladora')">
                                        desarrolladora
                                        @if ($sortField === 'desarrolladora')
                                            @if ($sortDirection === 'asc')
                                                &#9650;
                                            @else
                                                &#9660;
                                            @endif
                                        @endif
                                    </th><th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('distribuidora')">
                                        distribuidora
                                        @if ($sortField === 'distribuidora')
                                            @if ($sortDirection === 'asc')
                                                &#9650;
                                            @else
                                                &#9660;
                                            @endif
                                        @endif
                                    </th>
                                    <th class="px-6 py-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videojuegos as $videojuego)
                                    <tr
                                        class="border-b dark:border-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                                            {{ $videojuego->titulo }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $videojuego->anyo }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $videojuego->desarrolladora->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $videojuego->desarrolladora->distribuidora->nombre }}
                                        </td>
                                        <td class="px-6 py-4 flex justify-center space-x-4">
                                            <a href="{{ route('videojuegos.show', $videojuego) }}"
                                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                                                Ver
                                            </a>
                                            <a href="{{ route('videojuegos.edit', $videojuego) }}"
                                                class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                                Editar
                                            </a>
                                            <form method="POST"
                                                action="{{ route('videojuegos.destroy', $videojuego) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition"
                                                    onclick="return confirm('¿Está seguro de eliminar este videojuego?')">
                                                    Eliminar
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
            <div class="mt-6 flex justify-center">
                <a href="{{ route('videojuegos.create') }}"
                    class="px-6 py-3 text-lg font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                    Crear un nuevo videojuego
                </a>
            </div>

        </div>
    </div>

