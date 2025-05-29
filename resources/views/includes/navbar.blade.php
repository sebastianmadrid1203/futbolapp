<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <i class="bi bi-trophy-fill me-2"></i> FútbolApp
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Página principal -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">
                        <i class="bi bi-house-door-fill me-1"></i> Inicio
                    </a>
                </li>

                <!-- Dropdown de entidades -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear-fill me-1"></i> Gestión
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('presidents.index') }}"><i class="bi bi-person-badge me-1"></i> Presidentes</a></li>
                        <li><a class="dropdown-item" href="{{ route('teams.index') }}"><i class="bi bi-people-fill me-1"></i> Equipos</a></li>
                        <li><a class="dropdown-item" href="{{ route('players.index') }}"><i class="bi bi-person-lines-fill me-1"></i> Jugadores</a></li>
                        <li><a class="dropdown-item" href="{{ route('games.index') }}"><i class="bi bi-calendar-event-fill me-1"></i> Juegos</a></li>
                        <li><a class="dropdown-item" href="{{ route('goals.index') }}"><i class="bi bi-bullseye me-1"></i> Goles</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Usuario/Login a la derecha -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i> Registrarse
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>