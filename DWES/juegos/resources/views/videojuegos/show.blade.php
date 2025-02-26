<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver videojuego: {{ $videojuego->titulo }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-black">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-white md:text-lg dark:text-gray-400">
                                titulo
                            </dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $videojuego->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-white md:text-lg dark:text-gray-400">
                                anyo
                            </dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $videojuego->anyo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-white md:text-lg">
                                desarrolladora
                            </dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $videojuego->desarrolladora->nombre }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-white md:text-lg">
                                distribuidora
                            </dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $videojuego->desarrolladora->distribuidora->nombre }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('videojuegos.index') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-20 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Volver
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
