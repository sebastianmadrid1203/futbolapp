@extends('layouts.app')

@section('title', 'Lista de Equipos')

@section('content')
@auth
<div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
    <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="d-flex align-items-center mb-3 mb-md-0">
            <i class="bi bi-people-fill display-4 text-white me-3"></i>
            <div>
                <h2>Equipos registrados</h2>
                <small class="text-light">Gestión y administración de equipos</small>
            </div>
        </div>
        <a href="{{ route('teams.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Equipo
        </a>
    </div>
</div>

@if($teams->isEmpty())
    <div class="alert alert-info text-center rounded-3 shadow-sm animate__animated animate__fadeInDown">
        <i class="bi bi-info-circle me-2"></i>
        No hay equipos registrados aún.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 animate__animated animate__fadeInUp">
        @foreach ($teams as $team)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4 bg-team-card">
                    <div class="card-body text-center">
                        <i class="bi bi-shield-fill text-success display-4 mb-3"></i>
                        <h5 class="card-title text-capitalize fw-bold">{{ $team->name }}</h5>
                    </div>
                    <div class="card-footer bg-white border-top-0 d-flex justify-content-around p-3">
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-view btn-sm d-flex align-items-center gap-1" title="Ver">
                            <i class="bi bi-eye"></i> <span>Ver</span>
                        </a>
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-edit btn-sm d-flex align-items-center gap-1" title="Editar">
                            <i class="bi bi-pencil-square"></i> <span>Editar</span>
                        </a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete btn-sm d-flex align-items-center gap-1" title="Eliminar" onclick="return confirm('¿Eliminar este equipo?')">
                                <i class="bi bi-trash"></i> <span>Eliminar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@else
    <div class="alert alert-danger mt-5 text-center">
        <i class="bi bi-lock-fill me-2"></i>
        Debes iniciar sesión para ver esta sección.
    </div>
@endauth
@endsection