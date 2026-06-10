<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { font-family: 'Montserrat', sans-serif; }
        body {
            background-color: #0d0d0d;
            color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            background-color: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 420px;
        }
        .form-control {
            background-color: #0d0d0d;
            border-color: #2a2a2a;
            color: #f0f0f0;
        }
        .form-control:focus {
            background-color: #0d0d0d;
            border-color: #5B2D8E;
            color: #f0f0f0;
            box-shadow: 0 0 0 0.2rem rgba(91,45,142,0.25);
        }
        .form-control::placeholder { color: #666; }
        .btn-harmo {
            background-color: #3D1A6E;
            color: white;
            border: none;
            width: 100%;
            padding: 0.6rem;
        }
        .btn-harmo:hover {
            background-color: #5B2D8E;
            color: white;
        }
        .form-check-input:checked {
            background-color: #3D1A6E;
            border-color: #3D1A6E;
        }
        a { color: #a06ee0; }
        a:hover { color: #c090f0; }
        label { color: #ccc; }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="text-center mb-4">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="HARMO" height="60" style="mix-blend-mode: screen;">
            </a>
            <h4 class="fw-bold mt-2">HARMO</h4>
        </div>
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>