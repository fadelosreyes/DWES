<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexViedojuegos extends Component
{

    public $sortField = 'desarrolladora';
    public $sortDirection = 'asc';

    public function render()
    {
        //$query = Auth::user()
        //    ->videojuegos()
        //    ->join('desarrolladoras', 'desarrolladoras.id', '=', 'videojuegos.desarrolladora_id')
        //    ->orderBy('desarrolladoras.nombre', $this->sortDirection); // Ordenamos solo por desarrolladora



        //$query = Auth::user()
        //    ->videojuegos()
        //    ->join('desarrolladoras', 'desarrolladoras.id', '=', 'videojuegos.desarrolladora_id')
        //    ->join('distribuidoras', 'distribuidoras.id', '=', 'desarrolladoras.distribuidora_id')
        //    ->orderBy(
        //        $this->sortField === 'desarrolladora' ? 'desarrolladoras.nombre' :
        //        ($this->sortField === 'distribuidora' ? 'distribuidoras.nombre' :
        //        ($this->sortField === 'anyo' ? 'videojuegos.anyo' : 'videojuegos.titulo')),
        //        $this->sortDirection
        //    );

        // Iniciamos la consulta
        $query = Auth::user()
            ->videojuegos()
            ->join('desarrolladoras', 'desarrolladoras.id', '=', 'videojuegos.desarrolladora_id')
            ->join('distribuidoras', 'distribuidoras.id', '=', 'desarrolladoras.distribuidora_id')
            ->orderBy($this->sortField === 'desarrolladora' ? 'desarrolladoras.nombre' : 'distribuidoras.nombre', $this->sortDirection);

        // Ejecutamos la consulta
        $videojuegos = $query->get();

        // Retornamos la vista con los resultados
        return view('livewire.index-viedojuegos', [
            'videojuegos' => $videojuegos
        ]);
    }


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
}
