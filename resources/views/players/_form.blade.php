
<div class="mb-3">
    <label for="name" class="form-label">
        <i class="bi bi-person-fill me-1"></i> Nombre del jugador
    </label>
    <input type="text" name="name" id="name" class="form-control"
           value="{{ old('name', $player->name ?? '') }}" required autofocus>
</div>

<div class="mb-3">
    <label for="position" class="form-label">
        <i class="bi bi-joystick me-1"></i> Posición
    </label>
    <input type="text" name="position" id="position" class="form-control"
           value="{{ old('position', $player->position ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="team_id" class="form-label">
        <i class="bi bi-people-fill me-1"></i> Equipo
    </label>
    <select name="team_id" id="team_id" class="form-select" required>
        <option value="">Seleccione un equipo</option>
        @foreach($teams as $team)
            <option value="{{ $team->id }}" {{ (old('team_id', $player->team_id ?? '') == $team->id) ? 'selected' : '' }}>
                {{ $team->name }}
            </option>
        @endforeach
    </select>
</div>