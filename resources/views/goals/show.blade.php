
@extends('layouts.app')

@section('title', 'Detalle del Gol')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 animate__animated animate__fadeInDown mx-auto" style="max-width: 600px;">
        <div class="card-header bg-gradient-header text-white d-flex align-items-center">
            <i class="bi bi-bullseye display-6 me-2"></i>
            <span class="fs-5 fw-bold">Detalle del Gol</span>
        </div>
        <div class="card-body">
            <h5 class="card-title text-secondary mb-1">
                <i class="bi bi-flag-fill me-1"></i> Nombre:
            </h5>
            <p class="card-text fw-semibold text-success mb-3">{{ $goal->name }}</p>

            <h5 class="card-title text-secondary mb-1">
                <i class="bi bi-card-text me-1"></i> Descripción:
            </h5>
            <p class="card-text mb-3">{{ $goal->description ?? 'Sin descripción' }}</p>

            <h5 class="card-title text-secondary mb-1">
                <i class="bi bi-person-fill me-1"></i> Jugador:
            </h5>
            <p class="card-text mb-3">
                <span class="badge bg-primary">{{ $goal->player->name ?? 'No asignado' }}</span>
            </p>

            <h5 class="card-title text-secondary mb-1">
                <i class="bi bi-controller me-1"></i> Juego:
            </h5>
            <p class="card-text">
                <span class="badge bg-warning text-dark">
                    {{ $goal->game ? 'Juego del ' . \Carbon\Carbon::parse($goal->game->date)->format('d/m/Y') : 'No asignado' }}
                </span>
            </p>
        </div>
    </div>

    <a href="{{ route('goals.index') }}" class="btn btn-custom mt-4">
        <i class="bi bi-arrow-left me-1"></i> Volver al listado
    </a>
</div>
@endsection