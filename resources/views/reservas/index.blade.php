@extends('adminlte::page')

@section('content')
    <div class="container">
        <h2>Mis Reservas</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sala</th>
                    <th>Fecha</th>
                    <th>Bloque Horario</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->sala->descripcion ?? 'No disponible' }}</td>
                        <td>{{ $reserva->fecha }}</td>
                        <td>{{ $reserva->bloqueHorario->descripcion ?? 'No disponible' }}</td>
                        <td>{{ $reserva->estado->nombre ?? 'No disponible' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
