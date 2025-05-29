
<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi bi-shield-fill me-1"></i> Nombre del equipo
            </label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $team->name ?? '') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">
                <i class="bi bi-geo-alt-fill me-1"></i> Ciudad
            </label>
            <input type="text" name="city" id="city" class="form-control" 
                   value="{{ old('city', $team->city ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="stadium" class="form-label">
                <i class="bi bi-building me-1"></i> Estadio
            </label>
            <input type="text" name="stadium" id="stadium" class="form-control" 
                   value="{{ old('stadium', $team->stadium ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">
                <i class="bi bi-people me-1"></i> Capacidad
            </label>
            <input type="number" name="capacity" id="capacity" class="form-control" min="0"
                   value="{{ old('capacity', $team->capacity ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="year_of_foundation" class="form-label">
                <i class="bi bi-calendar-event me-1"></i> Año de fundación
            </label>
            <input type="number" name="year_of_foundation" id="year_of_foundation" class="form-control" min="1800"
                   value="{{ old('year_of_foundation', $team->year_of_foundation ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="president_id" class="form-label">
                <i class="bi bi-person-badge me-1"></i> Presidente
            </label>
            <select name="president_id" id="president_id" class="form-select" required>
                <option value="">Seleccione un presidente</option>
                @foreach($presidents as $president)
                    <option value="{{ $president->id }}"
                        {{ (old('president_id', $team->president_id ?? '') == $president->id) ? 'selected' : '' }}>
                        {{ $president->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>