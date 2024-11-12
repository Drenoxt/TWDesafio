{{-- resources/views/salas/create.blade.php --}}
@extends('adminlte::page')

@section('title', 'Crear Sala')

@section('content_header')
    <h1>Crear Sala</h1>
@stop

@section('content')
    <form action="{{ route('salas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre de la Sala</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Sala</button>
    </form>
@stop
