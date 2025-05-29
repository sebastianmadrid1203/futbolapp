@extends('layouts.app')

@section('title', 'Nuevo Jugador')

@section('content')
    <h2>Registrar nuevo jugador</h2>

    <form action="{{ route('players.store') }}" method="POST">
        @csrf
        @include('players._form', ['player' => null])
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
