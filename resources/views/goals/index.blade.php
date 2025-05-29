@extends('layouts.app')

@section('title', 'Listado de Goles')

@section('content')
@auth
<div class="container my-5">
    <div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
        <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                {{-- Ícono de balón SVG personalizado --}}
                <span class="d-inline-block me-3" style="width: 3rem; height: 3rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                        <circle cx="24" cy="24" r="22" stroke="#198754" stroke-width="4" fill="#fff"/>
                        <polygon points="24,12 31,18 28,28 20,28 17,18" fill="#198754"/>
                        <circle cx="24" cy="24" r="4" fill="#43cea2"/>
                    </svg>
                </span>
                <div>
                    <h2>Listado de Goles</h2>
                    <small class="text-light">Registro y gestión de goles en partidos</small>
                </div>
            </div>
            <a href="{{ route('goals.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Gol
            </a>
        </div>
    </div>

    @if ($goals->isEmpty())
        <div class="alert alert-info text-center animate__animated animate__fadeInDown">
            <i class="bi bi-info-circle me-2"></i>
            No hay goles registrados aún.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 animate__animated animate__fadeInUp">
            @foreach ($goals as $goal)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4 bg-goal-card">
                        <div class="card-body text-center">
                            {{-- Ícono de balón SVG personalizado --}}
                            <span class="d-inline-block mb-3" style="width: 3rem; height: 3rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                                    <circle cx="24" cy="24" r="22" stroke="#198754" stroke-width="4" fill="#fff"/>
                                    <polygon points="24,12 31,18 28,28 20,28 17,18" fill="#198754"/>
                                    <circle cx="24" cy="24" r="4" fill="#43cea2"/>
                                </svg>
                            </span>
                            <h5 class="card-title text-capitalize fw-bold">{{ $goal->name }}</h5>
                            {{-- Descripción y juego ocultos, solo se ven en la vista "Ver" --}}
                            <p class="mb-1">
                                <i class="bi bi-person-fill me-1"></i>
                                <span class="badge bg-primary">{{ $goal->player->name ?? 'N/A' }}</span>
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-around p-3">
                            <a href="{{ route('goals.show', $goal->id) }}" class="btn btn-view btn-sm d-flex align-items-center gap-1" title="Ver">
                                <i class="bi bi-eye"></i> <span>Ver</span>
                            </a>
                            <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-edit btn-sm d-flex align-items-center gap-1" title="Editar">
                                <i class="bi bi-pencil-square"></i> <span>Editar</span>
                            </a>
                            <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este gol?')">
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