
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="animated-bg">
    <div class="text-center">
    <h1 class="display-4 mb-3 animated-title">
    <i class="bi bi-trophy-fill trofeo-titulo me-2"></i>Bienvenido a <span class="titulo-futbolapp">FútbolApp</span>
</h1>
        <p class="lead mb-5">Sistema de gestión de equipos, jugadores, partidos y más.</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-3 mb-4">
                <div class="card shadow card-efecto">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-person-badge display-5 text-success"></i>
                        </div>
                        <h5 class="card-title">Presidentes</h5>
                        <p class="card-text">Gestión de presidentes de equipos.</p>
                        <a href="/presidents" class="btn btn-custom">Ver sección</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow card-efecto">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-people-fill display-5 text-primary"></i>
                        </div>
                        <h5 class="card-title">Equipos</h5>
                        <p class="card-text">Consulta y gestiona los equipos registrados.</p>
                        <a href="/teams" class="btn btn-custom">Ver sección</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow card-efecto">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-person-lines-fill display-5 text-danger"></i>
                        </div>
                        <h5 class="card-title">Jugadores</h5>
                        <p class="card-text">Administración de jugadores por equipo.</p>
                        <a href="/players" class="btn btn-custom">Ver sección</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
       "Este sistema no solo organiza nombres y fechas; honra la historia, reconoce el liderazgo y fortalece la 
       transparencia institucional. Cada presidente registrado es una huella que guía el presente y proyecta el futuro."
    </footer>
</div>
@endsection