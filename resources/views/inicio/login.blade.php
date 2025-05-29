
@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container">
    <h1>Iniciar sesión</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-primary">Entrar</button>
        <a href="{{ route('register') }}" class="btn btn-link">¿No tienes cuenta? Regístrate</a>
    </form>
</div>
@endsection