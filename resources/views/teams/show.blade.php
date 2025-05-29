@extends('layouts.app')

@section('title', 'Detalle del Equipo')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">
                <i class="bi bi-people-fill me-2"></i>
                {{ $team->name }}
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong><i class="bi bi-hash me-1"></i> ID:</strong> {{ $team->id }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-shield-fill me-1"></i> Nombre:</strong> {{ $team->name }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-geo-alt-fill me-1"></i> Ciudad:</strong> {{ $team->city }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-building me-1"></i> Estadio:</strong> {{ $team->stadium }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-people me-1"></i> Capacidad:</strong> {{ $team->capacity }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-calendar-event me-1"></i> Año de Fundación:</strong> {{ $team->year_of_foundation }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-person-badge me-1"></i> Presidente:</strong> {{ $team->president->name ?? 'Sin presidente' }}
                </li>
            </ul>
            <a href="{{ route('teams.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Editar
                </a>
            @endif
        </div>
    </div>
</div>
@endsection