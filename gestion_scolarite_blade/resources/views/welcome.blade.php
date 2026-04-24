<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Scolaire - Menu</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-section {
            /* Changement pour un dégradé Bleu Foncé / Marine */
            background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%);
            color: white;
            padding: 60px 0;
            border-radius: 0 0 50px 50px;
            margin-bottom: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .menu-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            height: 100%;
            text-decoration: none !important;
            display: block;
        }
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        .icon-box {
            width: 60px;
            height: 60px;
            /* Changement pour un fond bleu très clair */
            background: #eff6ff;
            /* Changement pour une icône bleu foncé */
            color: #1e3a8a;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .card-title {
            color: #1e293b;
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Système de Gestion Scolaire</h1>
        <p class="lead opacity-75">Administration et Configuration de l'établissement</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-sm-6">
            <a href="{{ route('annees.create') }}" class="card menu-card p-4 shadow-sm">
                <div class="icon-box"><i class="fas fa-calendar-alt"></i></div>
                <h5 class="card-title">Gérer les Années</h5>
                <p class="text-muted small">Configuration des périodes académiques.</p>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="{{ route('filieres.create') }}" class="card menu-card p-4 shadow-sm">
                <div class="icon-box"><i class="fas fa-graduation-cap"></i></div>
                <h5 class="card-title">Gérer les Filières</h5>
                <p class="text-muted small">Administration des branches d'études.</p>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="{{ route('categories.create') }}" class="card menu-card p-4 shadow-sm">
                <div class="icon-box"><i class="fas fa-tags"></i></div>
                <h5 class="card-title">Gérer les Catégories</h5>
                <p class="text-muted small">Types de niveaux (Licence, Master, etc).</p>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="{{ route('niveaux.create') }}" class="card menu-card p-4 shadow-sm">
                <div class="icon-box"><i class="fas fa-layer-group"></i></div>
                <h5 class="card-title">Gérer les Niveaux</h5>
                <p class="text-muted small">Organisation des cycles d'études.</p>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="{{ route('classes.create') }}" class="card menu-card p-4 shadow-sm">
                <div class="icon-box"><i class="fas fa-school"></i></div>
                <h5 class="card-title">Gérer les Classes</h5>
                <p class="text-muted small">Gestion des salles et groupes d'élèves.</p>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="{{ route('tarifs.create') }}" class="card menu-card p-4 shadow-sm">
                <div class="icon-box"><i class="fas fa-money-bill-wave"></i></div>
                <h5 class="card-title">Gérer les Tarifs</h5>
                <p class="text-muted small">Configuration de la scolarité et frais.</p>
            </a>
        </div>
    </div>
</div>

<footer class="text-center text-muted mt-5 mb-4">
    <small>&copy; 2026 - Plateforme de Gestion Scolaire v2.0</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>