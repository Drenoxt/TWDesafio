@extends('adminlte::page')

@section('content')
    <div class="container">
        <h2>Reservar Sala</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="sala_id">Sala</label>
                <select name="sala_id" id="sala_id" class="form-control" required onchange="showSalaDescription()">
                    <option value="">Seleccione una sala</option>
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}" data-descripcion="{{ $sala->descripcion }}">
                            {{ $sala->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion_sala">Descripción de la sala</label>
                <textarea id="descripcion_sala" class="form-control" rows="3" readonly></textarea>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bloque_id">Bloque Horario</label>
                <select name="bloque_id" id="bloque_id" class="form-control" required>
                    @foreach($bloquesHorarios as $bloque)
                        <option value="{{ $bloque->id }}">{{ $bloque->descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>

    <script>
        function showSalaDescription() {
            const salaSelect = document.getElementById('sala_id');
            const selectedOption = salaSelect.options[salaSelect.selectedIndex];
            const descripcion = selectedOption.getAttribute('data-descripcion');
            document.getElementById('descripcion_sala').value = descripcion || '';
        }
    </script>
@endsection
