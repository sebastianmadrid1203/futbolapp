
@extends('layouts.app')

@section('title', 'Crear Juego')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 animate__animated animate__fadeInDown">
                <div class="card-header bg-gradient-header text-white d-flex align-items-center">
                    <i class="bi bi-controller display-6 me-2"></i>
                    <span class="fs-5 fw-bold">Crear Nuevo Juego</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('games.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="date" class="form-label">
                                <i class="bi bi-calendar-event me-1"></i> Fecha
                            </label>
                            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="local_goals" class="form-label">
                                    <i class="bi bi-trophy me-1"></i> Goles Local
                                </label>
                                <input type="number" name="local_goals" id="local_goals" min="0" class="form-control @error('local_goals') is-invalid @enderror" value="{{ old('local_goals', 0) }}" required>
                                @error('local_goals')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="away_goals" class="form-label">
                                    <i class="bi bi-trophy me-1"></i> Goles Visitante
                                </label>
                                <input type="number" name="away_goals" id="away_goals" min="0" class="form-control @error('away_goals') is-invalid @enderror" value="{{ old('away_goals', 0) }}" required>
                                @error('away_goals')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-people-fill me-1"></i> Equipos Participantes
                            </label>
                            <div class="d-flex gap-2 flex-column flex-md-row">
                                <select name="teams[]" class="form-select @error('teams') is-invalid @enderror" required>
                                    <option value="">-- Equipo Local --</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}" {{ (old('teams.0') == $team->id) ? 'selected' : '' }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="teams[]" class="form-select @error('teams') is-invalid @enderror" required>
                                    <option value="">-- Equipo Visitante --</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}" {{ (old('teams.1') == $team->id) ? 'selected' : '' }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('teams')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            @error('teams.*')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-custom">
                                <i class="bi bi-check-circle me-1"></i> Crear Juego
                            </button>
                            <a href="{{ route('games.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection