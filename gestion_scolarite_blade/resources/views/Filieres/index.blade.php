<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'une Classe | Gestion Scolaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card { 
            border-radius: 20px; 
            overflow: hidden;
        }
        /* Harmonisation avec le thème Bleu Marine */
        .card-header-custom {
            background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }
        .form-label { 
            font-weight: 600; 
            color: #4b5563; 
            font-size: 0.9rem;
        }
        .form-control, .form-select {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 0.25rem rgba(30, 58, 138, 0.1);
        }
        .btn-primary { 
            background-color: #1e3a8a; 
            border: none; 
            padding: 12px 30px;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .btn-primary:hover { 
            background-color: #172554; 
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.2);
        }
        .btn-outline-secondary {
            border-radius: 10px;
            padding: 12px 30px;
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card border-0 shadow-lg">
                <div class="card-header-custom">
                    <h2 class="h4 mb-0 fw-bold"><i class="fas fa-chalkboard me-2"></i>🏫 Création d'une Classe</h2>
                </div>
                
                <div class="card-body p-5">
                    <form action="{{ route('classes.store') }}" method="POST" class="row g-4">
                        @csrf
                        
                        <div class="col-md-8">
                            <label class="form-label">Nom de la Classe</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="fas fa-tag"></i></span>
                                <input type="text" name="nom_classe" class="form-control" placeholder="Ex: L1 Informatique" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Code</label>
                            <input type="text" name="code_classe" class="form-control" placeholder="Ex: L1-INFO" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Filière</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="fas fa-graduation-cap"></i></span>
                                <select name="filiere_id" class="form-select border-primary-subtle" required>
                                    <option selected disabled>Choisir une filière...</option>
                                    @foreach($filieres as $f)
                                        <option value="{{ $f->id }}">{{ $f->nom_filiere }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Niveau</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="fas fa-layer-group"></i></span>
                                <select name="niveau_id" class="form-select border-primary-subtle" required>
                                    <option selected disabled>Choisir un niveau...</option>
                                    @foreach($niveaux as $n)
                                        <option value="{{ $n->id }}">{{ $n->nom_niveaux }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 mt-5 pt-3 border-top d-flex justify-content-between align-items-center">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary px-4 text-decoration-none">
                                <i class="fas fa-times me-2"></i>Annuler
                            </a>
                            <button type="submit" class="btn btn-primary fw-bold shadow">
                                <i class="fas fa-check-circle me-2"></i>Valider la création
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <p class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-muted small text-decoration-none">
                    <i class="fas fa-home me-1"></i> Retour à l'accueil
                </a>
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>