@extends('layouts.app')

@section('title', 'Detalle del Presidente')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                <i class="bi bi-person-badge me-2"></i>
                {{ $president->name }}
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong><i class="bi bi-hash me-1"></i> ID:</strong> {{ $president->id }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-person-fill me-1"></i> Nombre:</strong> {{ $president->name }}
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-calendar-event me-1"></i> Año:</strong> {{ $president->year }}
                </li>
            </ul>
            <a href="{{ route('presidents.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('presidents.edit', $president->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Editar
                </a>
            @endif
        </div>
    </div>
</div>
@endsection