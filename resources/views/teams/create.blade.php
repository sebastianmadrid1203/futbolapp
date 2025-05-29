
@extends('layouts.app')

@section('title', 'Nuevo Equipo')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0 animate__animated animate__fadeInDown">
            <div class="card-header bg-gradient-header text-white d-flex align-items-center">
                <i class="bi bi-shield-fill-plus display-6 me-2"></i>
                <span class="fs-5 fw-bold">Registrar nuevo equipo</span>
            </div>
            <div class="card-body">
                <form action="{{ route('teams.store') }}" method="POST">
                    @csrf
                    @include('teams._form', ['team' => null])
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-custom">
                            <i class="bi bi-check-circle me-1"></i> Guardar
                        </button>
                        <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection