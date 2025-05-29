
@extends('layouts.app')

@section('title', 'Crear Gol')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 animate__animated animate__fadeInDown mx-auto" style="max-width: 650px;">
        <div class="card-header bg-gradient-header text-white d-flex align-items-center">
            <i class="bi bi-bullseye display-6 me-2"></i>
            <span class="fs-5 fw-bold">Crear Nuevo Gol</span>
        </div>
        <div class="card-body">
            <form action="{{ route('goals.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold text-secondary">
                        <i class="bi bi-flag-fill me-1"></i> Nombre del Gol
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror" placeholder="Nombre del gol" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold text-secondary">
                        <i class="bi bi-card-text me-1"></i> Descripción
                    </label>
                    <textarea name="description" id="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror" placeholder="Descripción breve">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="player_id" class="form-label fw-semibold text-secondary">
                        <i class="bi bi-person-fill me-1"></i> Jugador
                    </label>
                    <select name="player_id" id="player_id" class="form-select @error('player_id') is-invalid @enderror" required>
                        <option value="">-- Seleccionar jugador --</option>
                        @foreach($players as $player)
                            <option value="{{ $player->id }}" {{ old('player_id') == $player->id ? 'selected' : '' }}>
                                {{ $player->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('player_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="game_id" class="form-label fw-semibold text-secondary">
                        <i class="bi bi-controller me-1"></i> Juego
                    </label>
                    <select name="game_id" id="game_id" class="form-select @error('game_id') is-invalid @enderror" required>
                        <option value="">-- Seleccionar juego --</option>
                        @foreach($games as $game)
                            <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::parse($game->date)->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                    @error('game_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-custom">
                        <i class="bi bi-check-circle me-1"></i> Guardar Gol
                    </button>
                    <a href="{{ route('goals.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection