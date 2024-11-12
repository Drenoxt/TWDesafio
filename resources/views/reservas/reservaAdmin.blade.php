@extends('adminlte::page')

@section('content')
    <div class="container">
        <h2>Listado de Reservas</h2>

        <form method="GET" action="{{ route('reservas.admin_index') }}" class="mb-4">
            <div class="form-group">
                <label for="sala_id">Filtrar por Sala:</label>
                <select name="sala_id" id="sala_id" class="form-control">
                    <option value="">Todas las Salas</option>
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}" {{ request('sala_id') == $sala->id ? 'selected' : '' }}>
                            {{ $sala->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Sala</th>
                    <th>Fecha</th>
                    <th>Bloque Horario</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ $reserva->user->name }}</td>
                        <td>{{ $reserva->sala->nombre }}</td>
                        <td>{{ $reserva->fecha }}</td>
                        <td>{{ $reserva->bloqueHorario->descripcion }}</td>
                        <td>
                            <form action="{{ route('reservas.cambiar_estado', $reserva) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="estado_id" class="form-control">
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}" {{ $reserva->estado_id == $estado->id ? 'selected' : '' }}>
                                            {{ $estado->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm mt-1">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection