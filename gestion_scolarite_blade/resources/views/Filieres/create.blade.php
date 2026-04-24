<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Ajouter Filière | Gestion Scolaire</title>
    <style>
        body { 
            background-color: #f8f9fa; 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            font-family: 'Segoe UI', sans-serif;
        }
        .card { 
            border-radius: 20px; 
            border: none; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
        }
        .card-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%);
            color: white;
            border-radius: 20px 20px 0 0 !important;
            padding: 25px;
            text-align: center;
            border: none;
        }
        .btn-primary { 
            background-color: #1e3a8a; 
            border: none; 
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover { 
            background-color: #172554; 
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.2);
        }
        .form-label { color: #4b5563; }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 0.25rem rgba(30, 58, 138, 0.1);
        }
        .btn-light {
            border-radius: 10px;
            padding: 10px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="h4 mb-0 fw-bold"><i class="fas fa-graduation-cap me-2"></i>Nouvelle Filière</h3>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted text-center small mb-4">Enregistrez une nouvelle spécialité d'étude.</p>
                        
                        <form action="{{ route('filieres.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Code de la Filière</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-barcode text-muted"></i></span>
                                    <input type="text" name="code" class="form-control border-start-0" placeholder="Ex: GL, RI, MK..." required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label small fw-bold">Nom complet de la Filière</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-book text-muted"></i></span>
                                    <input type="text" name="nom_filiere" class="form-control border-start-0" placeholder="Ex: Génie Logiciel" required>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                    <i class="fas fa-save me-2"></i>Enregistrer la Filière
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-light border text-muted small mt-1">
                                    <i class="fas fa-arrow-left me-1"></i>Retour au menu principal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>