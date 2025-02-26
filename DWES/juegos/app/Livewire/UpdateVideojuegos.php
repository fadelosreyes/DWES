<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Videojuego;
use App\Models\Distribuidora;
use App\Models\Desarrolladora;

class UpdateVideojuegos extends Component
{
    public $videojuegoId;
    public $titulo;
    public $anyo;
    public $distribuidora_id;
    public $desarrolladora_id;
    public $desarrolladorasFiltradas = [];

    public function mount($videojuegoId)
    {
        $videojuego = Videojuego::findOrFail($videojuegoId);

        $this->videojuegoId = $videojuego->id;
        $this->titulo = $videojuego->titulo;
        $this->anyo = $videojuego->anyo;
        $this->desarrolladora_id = $videojuego->desarrolladora_id;
        $this->distribuidora_id = $videojuego->desarrolladora->distribuidora->id;

        $this->desarrolladorasFiltradas = Desarrolladora::where('distribuidora_id', $this->distribuidora_id)->get();
    }

    public function updatedDistribuidoraId($value)
    {
        if (!empty($value)) {
            $this->desarrolladorasFiltradas = Desarrolladora::where('distribuidora_id', $value)->get();
            $this->desarrolladora_id = null;
        } else {
            $this->desarrolladorasFiltradas = [];
        }
    }

    public function actualizar()
    {
        $this->validate([
            'titulo' => 'required|string|max:255',
            'anyo' => 'required|integer|min:1950|max:',
            'desarrolladora_id' => 'required|exists:desarrolladoras,id',
            'distribuidora_id' => 'required|exists:distribuidoras,id',
        ]);

        $videojuego = Videojuego::findOrFail($this->videojuegoId);
        $videojuego->update([
            'titulo' => $this->titulo,
            'anyo' => $this->anyo,
            'desarrolladora_id' => $this->desarrolladora_id,
        ]);

        session()->flash('message', 'Videojuego actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.update-videojuegos', [
            'distribuidoras' => Distribuidora::all(),
            'desarrolladoras' => $this->desarrolladorasFiltradas,
        ]);
    }
}
