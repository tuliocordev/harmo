<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HARMO Admin - {{ $title ?? 'Painel' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
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

        .navbar-admin {
            background-color: #1a0a35;
            padding-top: 14px;
            padding-bottom: 14px;
            border-bottom: 2px solid var(--harmo-purple);
        }

        .navbar-admin .navbar-brand {
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #fff !important;
        }

        .navbar-admin .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
        }

        .navbar-admin .nav-link:hover,
        .navbar-admin .nav-link.active {
            color: #fff !important;
            background-color: rgba(255,255,255,0.08);
            border-radius: 6px;
        }

        .sidebar {
            background-color: #110820;
            min-height: calc(100vh - 60px);
            border-right: 1px solid #2a2a2a;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.75);
            padding: 10px 20px;
            border-radius: 6px;
            margin-bottom: 4px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--harmo-purple);
            color: #fff;
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 8px;
        }

        .admin-content {
            padding: 30px;
        }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #2a2a2a;
            color: #f0f0f0;
        }

        .card-header {
            background-color: #1f1f1f;
            border-bottom: 1px solid #2a2a2a;
            font-weight: 600;
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

        .badge-admin {
            background-color: var(--harmo-purple);
            color: white;
            font-size: 0.7rem;
            padding: 3px 8px;
            border-radius: 10px;
            margin-left: 6px;
        }
    </style>
</head>
<body>

    <!-- Navbar Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="HARMO" height="30" style="mix-blend-mode: screen;">
                HARMO <span class="badge-admin">ADMIN</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-left"></i> Ver site
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" type="submit">
                        <i class="bi bi-power"></i> Sair
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <nav class="nav flex-column p-3">
                    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a class="nav-link {{ request()->is('admin/songs*') ? 'active' : '' }}" href="/admin/songs">
                        <i class="bi bi-music-note-list"></i> Músicas
                    </a>
                    <a class="nav-link {{ request()->is('admin/artists*') ? 'active' : '' }}" href="/admin/artists">
                        <i class="bi bi-person-circle"></i> Artistas
                    </a>
                    <a class="nav-link {{ request()->is('admin/albums*') ? 'active' : '' }}" href="/admin/albums">
                        <i class="bi bi-vinyl"></i> Álbuns
                    </a>
                    <a class="nav-link {{ request()->is('admin/genres*') ? 'active' : '' }}" href="/admin/genres">
                        <i class="bi bi-tags"></i> Gêneros
                    </a>
                    <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="/admin/users">
                        <i class="bi bi-people"></i> Usuários
                    </a>
                </nav>
            </div>

            <!-- Conteúdo -->
            <div class="col-md-10 admin-content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>