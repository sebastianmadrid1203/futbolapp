@extends('layouts.app')

@section('title', 'Juegos')

@section('content')
@auth
<div class="container mt-4">
    <div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
        <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <i class="bi bi-controller display-4 text-white me-3"></i>
                <div>
                    <h2>Listado de Juegos</h2>
                    <small class="text-light">Gestión y resultados de partidos</small>
                </div>
            </div>
            <a href="{{ route('games.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Juego
            </a>
        </div>
    </div>

    @if ($games->isEmpty())
        <div class="alert alert-info text-center animate__animated animate__fadeInDown">
            <i class="bi bi-info-circle me-2"></i>
            No hay juegos registrados aún.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 animate__animated animate__fadeInUp">
            @foreach ($games as $game)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4 bg-game-card">
                        <div class="card-body text-center">
                            <i class="bi bi-controller text-primary display-4 mb-3"></i>
                            <h5 class="card-title fw-bold mb-2">
                                {{ $game->teams->get(0)->name ?? 'N/A' }}
                                <span class="fw-normal text-dark mx-1">vs</span>
                                {{ $game->teams->get(1)->name ?? 'N/A' }}
                            </h5>
                            <p class="mb-1">
                                <span class="badge bg-info text-dark">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ \Carbon\Carbon::parse($game->date)->format('d/m/Y') }}
                                </span>
                            </p>
                            <p class="mb-1">
                                <span class="badge bg-success"><i class="bi bi-trophy me-1"></i> Local: {{ $game->local_goals }}</span>
                                <span class="badge bg-danger"><i class="bi bi-trophy me-1"></i> Visitante: {{ $game->away_goals }}</span>
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-around p-3">
                            <a href="{{ route('games.show', $game->id) }}" class="btn btn-view btn-sm d-flex align-items-center gap-1" title="Ver">
                                <i class="bi bi-eye"></i> <span>Ver</span>
                            </a>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-edit btn-sm d-flex align-items-center gap-1" title="Editar">
                                <i class="bi bi-pencil-square"></i> <span>Editar</span>
                            </a>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Estás seguro de eliminar este juego?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete btn-sm d-flex align-items-center gap-1" title="Eliminar">
                                    <i class="bi bi-trash"></i> <span>Eliminar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@else
    <div class="alert alert-danger mt-5 text-center">
        <i class="bi bi-lock-fill me-2"></i>
        Debes iniciar sesión para ver esta sección.
    </div>
@endauth
@endsection