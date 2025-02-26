<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //poner en livewire

        //$videojuegos = Auth::user()
        //    ->videojuegos()
        //    ->with(['desarrolladora.distribuidora'])
        //    ->get();

        return view('videojuegos.index', [
            //'videojuegos' => $videojuegos,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuegos.create',[
            'desarrolladoras' => Desarrolladora::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'anyo' => 'required|integer|min:1000|max:9999',
            'desarrolladora_id' => 'required',
        ]);
        //dd($validated);

        Videojuego::create($validated);

        session()->flash('exito', 'videojuego creado correctamente.');
        return redirect()->route('videojuegos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', [
            'videojuego'  => $videojuego,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        return view('videojuegos.edit', [
            'videojuego'  => $videojuego,
            'desarrolladoras' => Desarrolladora::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'anyo' => 'required|integer|min:1000|max:9999',
            'desarrolladora_id' => 'required',
        ]);

        $videojuego->fill($validated);

        $videojuego->save();


        session()->flash('exito', 'videojuego editado correctamente.');
        return redirect()->route('videojuegos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index');
    }
}
