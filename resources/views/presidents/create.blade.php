
@extends('layouts.app')

@section('title', 'Nuevo presidente')

@section('content')
<div class="container">
    <h1>Nuevo presidente</h1>
    <form action="{{ route('presidents.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="number" name="year" class="form-control" required min="1900" max="{{ date('Y') }}" value="{{ old('year') }}">
            @error('year')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('presidents.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection