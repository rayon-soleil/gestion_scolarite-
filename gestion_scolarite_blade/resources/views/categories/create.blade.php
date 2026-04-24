<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Catégorie | Gestion Scolaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }
        .card-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%);
            color: white;
            border-radius: 20px 20px 0 0 !important;
            padding: 25px;
            text-align: center;
            border: none;
        }
        .form-label { font-weight: 600; color: #4b5563; }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 0.25rem rgba(30, 58, 138, 0.1);
        }
        .btn-save {
            background-color: #1e3a8a;
            border: none;
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-save:hover {
            background-color: #172554;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .btn-cancel {
            border-radius: 10px;
            padding: 10px;
            color: #6c757d;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-cancel:hover {
            background-color: #f1f5f9;
            color: #1e3a8a;
        }
    </style>
</head>
<body>

<div class="card shadow">
    <div class="card-header">
        <h4 class="mb-0"><i class="fas fa-tags me-2"></i>Nouvelle Catégorie</h4>
    </div>
    <div class="card-body p-4">
        <p class="text-muted text-center small mb-4">Créez un nouveau groupe pour organiser vos niveaux scolaires.</p>
        
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label">Nom de la catégorie</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-layer-group text-muted"></i></span>
                    <input type="text" name="categories_niveau" class="form-control border-start-0" placeholder="Ex: Licence, Master..." required>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-check-circle me-2"></i>Enregistrer
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-cancel text-center small border mt-1">
                    <i class="fas fa-times me-1"></i>Annuler
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>