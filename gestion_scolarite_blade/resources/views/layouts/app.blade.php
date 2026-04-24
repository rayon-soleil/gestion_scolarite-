<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Scolaire - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-custom { background: linear-gradient(45deg, #1e3a8a, #3b82f6); color: white; padding: 15px; }
        .card-table { border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .thead-custom { background-color: #212529; color: white; }
    </style>
</head>
<body>
    <nav class="navbar-custom mb-5">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="h4 mb-0"><i class="fas fa-graduation-cap me-2"></i> Mon Application Scolaire</span>
            <a href="{{ url('/') }}" class="text-white text-decoration-none small"><i class="fas fa-home me-1"></i> Accueil</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
