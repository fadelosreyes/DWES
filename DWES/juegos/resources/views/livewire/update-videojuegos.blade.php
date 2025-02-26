<div>
    @if (session()->has('message'))
        <div class="bg-green-200 p-2 text-green-800 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="actualizar" class="max-w-md mx-auto">
        <div class="mb-4">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" wire:model="titulo" class="block w-full p-2 border border-gray-300 rounded">
            @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="anyo">Año</label>
            <input type="number" id="anyo" wire:model="anyo" class="block w-full p-2 border border-gray-300 rounded">
            @error('anyo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="distribuidora_id">Distribuidora</label>
            <select wire:model.live="distribuidora_id" id="distribuidora_id" class="block w-full p-2 border border-gray-300 rounded">
                <option value="" disabled selected>Selecciona una distribuidora</option>
                @foreach ($distribuidoras as $distribuidora)
                    <option value="{{ $distribuidora->id }}">{{ $distribuidora->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="desarrolladora_id">Desarrolladora</label>
            <select wire:model.live="desarrolladora_id" id="desarrolladora_id" class="block w-full p-2 border border-gray-300 rounded">
                <option value="" disabled selected>Selecciona una desarrolladora...</option>
                @foreach ($desarrolladoras as $desarrolladora)
                    <option value="{{ $desarrolladora->id }}">{{ $desarrolladora->nombre }}</option>
                @endforeach
            </select>
            @error('desarrolladora_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Actualizar
        </button>
    </form>
</div>
