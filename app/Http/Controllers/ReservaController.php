<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use App\Models\BloqueHorario;
use App\Models\EstadoReserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:is_client')->except(['indexAdmin', 'cambiarEstado']);
        $this->middleware('can:is_admin')->only(['indexAdmin', 'cambiarEstado']);
    }

    public function create()
    {
        $salas = Sala::all();
        $bloquesHorarios = BloqueHorario::all();

        return view('reservas.create', compact('salas', 'bloquesHorarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sala_id' => 'required|exists:salas,id',
            'fecha' => 'required|date',
            'bloque_id' => 'required|exists:bloque_horarios,id',
        ]);

        $existeReserva = Reserva::where('sala_id', $request->sala_id)
            ->where('fecha', $request->fecha)
            ->where('bloque_id', $request->bloque_id)
            ->exists();

        if ($existeReserva) {
            return redirect()->back()->withErrors(['error' => 'La sala ya está reservada para esa fecha y bloque de horario.']);
        }

        Reserva::create([
            'user_id' => Auth::id(),
            'sala_id' => $request->sala_id,
            'fecha' => $request->fecha,
            'bloque_id' => $request->bloque_id,
            'estado_id' => 1,
        ]);

        return redirect()->route('reservas.mis-reservas')->with('success', 'Reserva creada exitosamente.');
    }

    public function misReservas()
    {
        $reservas = Reserva::where('user_id', Auth::id())
                ->with(['estado', 'sala', 'bloqueHorario'])
                ->get();
        return view('reservas.index', compact('reservas'));
    }

    public function indexAdmin(Request $request)
    {
        $salas = Sala::all();
        $estados = EstadoReserva::all();

        $query = Reserva::with(['user', 'sala', 'bloqueHorario', 'estado']);

        if ($request->has('sala_id') && $request->sala_id) {
            $query->where('sala_id', $request->sala_id);
        }

        $reservas = $query->get();

        return view('reservas.reservaAdmin', compact('reservas', 'estados', 'salas'));
    }

    public function cambiarEstado(Request $request, Reserva $reserva)
    {
        $request->validate([
            'estado_id' => 'required|exists:estado_reservas,id',
        ]);

        $reserva->estado_id = $request->estado_id;
        $reserva->save();

        return redirect()->route('reservas.admin_index')->with('success', 'Estado de la reserva actualizado correctamente.');
    }
}
