@extends('layouts.app')

@section('title', 'Presidentes')

@section('content')
@auth
    <div class="card mb-4 border-0 shadow-lg bg-gradient-header animate__animated animate__fadeInDown">
        <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-person-badge display-4 text-white me-3"></i>
                <div>
                    <h2>Presidentes registrados</h2>
                    <small class="text-light">Visualización tipo tarjeta para una experiencia moderna</small>
                </div>
            </div>
            <a href="{{ route('presidents.create') }}" class="btn btn-lg btn-custom shadow animate__animated animate__pulse animate__infinite">
                <i class="bi bi-plus-circle me-2"></i> Agregar Presidente
            </a>
        </div>
    </div>

    @if($presidents->isEmpty())
        <div class="alert alert-info text-center rounded-3 shadow-sm animate__animated animate__fadeInDown">
            <i class="bi bi-info-circle me-2"></i> No hay presidentes registrados aún.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 animate__animated animate__fadeInUp">
            @foreach ($presidents as $president)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4 bg-president-card">
                        <div class="card-body text-center">
                            <i class="bi bi-person-fill text-primary display-4 mb-3"></i>
                            <h5 class="card-title text-capitalize fw-bold">{{ $president->name }}</h5>
                            <p class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i> Año de mandato: 
                                <span class="badge bg-info text-dark">{{ $president->year }}</span>
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-around p-3">
                            <a href="{{ route('presidents.show', $president->id) }}" class="btn btn-view btn-sm d-flex align-items-center gap-1">
                                <i class="bi bi-eye"></i> <span>Ver</span>
                            </a>
                            <a href="{{ route('presidents.edit', $president->id) }}" class="btn btn-edit btn-sm d-flex align-items-center gap-1">
                                <i class="bi bi-pencil-square"></i> <span>Editar</span>
                            </a>
                            <form action="{{ route('presidents.destroy', $president->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete btn-sm d-flex align-items-center gap-1" onclick="return confirm('¿Eliminar este presidente?')">
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
    <div class="alert alert-danger text-center mt-5">
        <i class="bi bi-lock-fill me-2"></i> Debes iniciar sesión para acceder a esta sección.
    </div>
@endauth
@endsection