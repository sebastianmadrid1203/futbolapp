@extends('layouts.app')

@section('title', 'Detalle del Juego')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">
                <i class="bi bi-controller me-2"></i>
                Juego #{{ $game->id }}
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong><i class="bi bi-calendar-event me-1"></i> Fecha:</strong>
                    {{ \Carbon\Carbon::parse($game->date)->format('d/m/Y') }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-trophy me-1"></i> Goles Local:</strong>
                    {{ $game->local_goals }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-trophy me-1"></i> Goles Visitante:</strong>
                    {{ $game->away_goals }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-people me-1"></i> Equipos:</strong>
                    <span class="badge bg-primary">
                        {{ $game->teams->get(0)->name ?? 'N/A' }}
                    </span>
                    <span class="fw-bold text-dark mx-1">vs</span>
                    <span class="badge bg-warning text-dark">
                        {{ $game->teams->get(1)->name ?? 'N/A' }}
                    </span>
                </li>
            </ul>
            <a href="{{ route('games.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Editar
                </a>
            @endif
        </div>
    </div>
</div>
@endsection