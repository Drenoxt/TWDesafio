<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:is_admin');
    }

    public function create()
    {
        return view('salas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        Sala::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('salas.index')->with('success', 'Sala creada exitosamente.');
    }

    public function index()
    {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $sala->delete();

        return redirect()->route('salas.index')->with('success', 'Sala eliminada exitosamente.');
    }
}
