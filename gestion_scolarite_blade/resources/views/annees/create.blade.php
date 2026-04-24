<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Année Académique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        .card-header {
            background: linear-gradient(45deg, #1e3a8a, #3b82f6);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
            text-align: center;
            border: none;
        }
        .form-label {
            font-weight: 600;
            color: #4b5563;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #d1d5db;
        }
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }
        .btn-primary {
            background-color: #1e3a8a;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1e40af;
            transform: translateY(-1px);
        }
        .input-group-text {
            background-color: #f9fafb;
            border-right: none;
        }
        .input-group .form-control {
            border-left: none;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <h4 class="mb-0"><i class="fas fa-calendar-plus me-2"></i>Année Académique</h4>
    </div>
    <div class="card-body p-4">
        <p class="text-muted text-center mb-4">Enregistrez une nouvelle session scolaire</p>
        @if ($errors->any())
    <div class="alert alert-danger py-2">
        <ul class="mb-0 small">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('annees.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="code" class="form-label">Code de l'année</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-hashtag text-muted"></i></span>
                    <input type="text" name="code" id="code" class="form-control" placeholder="Ex: 2025-2026" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="dateOuverture" class="form-label">Ouverture École</label>
                    <input type="date" name="dateOuverture" id="dateOuverture" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="dateFermeture" class="form-label">Fermeture École</label>
                    <input type="date" name="dateFermeture" id="dateFermeture" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="dateDebutInscription" class="form-label text-truncate small">Debut Inscriptions</label>
                    <input type="date" name="dateDebutInscription" id="dateDebutInscription" class="form-control" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="dateFinInscription" class="form-label text-truncate small">Fin Inscriptions</label>
                    <input type="date" name="dateFinInscription" id="dateFinInscription" class="form-control" required>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Enregistrer l'année
                </button>
                <a href="{{ url('/') }}" class="btn btn-link text-decoration-none text-muted mt-2">
                    <i class="fas fa-arrow-left me-1"></i> Retour au menu principal
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
