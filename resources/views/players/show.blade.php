@extends('layouts.app')

@section('title', 'Detalle del Jugador')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                <i class="bi bi-person-lines-fill me-2"></i>
                {{ $player->name }}
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong><i class="bi bi-hash me-1"></i> ID:</strong> {{ $player->id }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-person-fill me-1"></i> Nombre:</strong> {{ $player->name }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-joystick me-1"></i> Posición:</strong> {{ $player->position }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-people-fill me-1"></i> Equipo:</strong> {{ $player->team->name ?? 'Sin equipo' }}
                </li>
            </ul>
            <a href="{{ route('players.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Editar
                </a>
            @endif
        </div>
    </div>
</div>
@endsection