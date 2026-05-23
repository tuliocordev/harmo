<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Harmo') }} - {{ $title ?? 'Catálogo de Músicas' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --harmo-purple: #3D1A6E;
            --harmo-purple-light: #5B2D8E;
        }

        * { font-family: 'Montserrat', sans-serif; }

        body {
            background-color: #0d0d0d;
            color: #f0f0f0;
        }

        .navbar-harmo {
            background-color: var(--harmo-purple);
            padding-top: 18px;
            padding-bottom: 18px;
            border-bottom: 2px solid #2a2a2a;
        }

        .navbar-harmo .navbar-brand {
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: #fff !important;
        }

        .navbar-harmo .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
        }

        .navbar-harmo .nav-link:hover {
            color: #fff !important;
        }

        .navbar-brand img {
            filter: drop-shadow(0 0 6px rgba(160, 110, 224, 0.5));
            transition: filter 0.2s ease;
        }

        .navbar-brand:hover img {
            filter: drop-shadow(0 0 10px rgba(160, 110, 224, 0.9));
        }

        .page-divider {
            border: none;
            border-top: 1px solid #2a2a2a;
            margin: 0;
        }

        .btn-harmo {
            background-color: var(--harmo-purple);
            color: white;
            border: none;
        }

        .btn-harmo:hover {
            background-color: var(--harmo-purple-light);
            color: white;
        }

        .text-harmo { color: #a06ee0; }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #2a2a2a;
            color: #f0f0f0;
        }

        .card .text-muted { color: #888 !important; }

        .card-footer {
            background-color: #1f1f1f;
            border-top: 1px solid #2a2a2a;
        }

        .alert-info {
            background-color: #1a1a2e;
            border-color: #2a2a4a;
            color: #a0a0d0;
        }

        footer {
            border-top: 1px solid #2a2a2a;
            background-color: #0d0d0d !important;
        }

        .footer-logo {
            filter: drop-shadow(0 0 4px rgba(160, 110, 224, 0.4));
        }

        .form-control {
            background-color: #1a1a1a;
            border-color: #2a2a2a;
            color: #f0f0f0;
        }

        .form-control:focus {
            background-color: #1a1a1a;
            border-color: var(--harmo-purple-light);
            color: #f0f0f0;
            box-shadow: 0 0 0 0.2rem rgba(91, 45, 142, 0.25);
        }

        .form-control::placeholder { color: #666; }

        .dropdown-menu {
            background-color: #1a1a1a;
            border-color: #2a2a2a;
        }

        .dropdown-item {
            color: #f0f0f0;
        }

        .dropdown-item:hover {
            background-color: #2a2a2a;
            color: #fff;
        }

        .dropdown-divider { border-color: #2a2a2a; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-harmo">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="HARMO" height="12">
                HARMO
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('songs.index') }}">
                            <i class="bi bi-music-note-list"></i> Músicas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artists.index') }}">
                            <i class="bi bi-person-circle"></i> Artistas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('albums.index') }}">
                            <i class="bi bi-vinyl"></i> Álbuns
                        </a>
                    </li>
                </ul>

                <form class="d-flex me-3" action="{{ route('songs.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="q" placeholder="Buscar músicas...">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-fill"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('playlists.index') }}">Minhas Playlists</a></li>
                                @if(Auth::user()->isAdmin())
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/admin">Painel Admin</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light ms-2" href="{{ route('register') }}">Cadastrar</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <hr class="page-divider">

    <main>
        {{ $slot }}
    </main>

    <footer class="text-light py-4 mt-5">
        <div class="container text-center">
            <img src="{{ asset('images/logo.png') }}" alt="HARMO" height="1" class="footer-logo mb-2">
            <p class="mb-0" style="color: #555;">HARMO — Catálogo de Músicas</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>