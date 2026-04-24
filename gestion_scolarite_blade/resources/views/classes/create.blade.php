<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Classe | Gestion Scolaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; padding-top: 50px; }
        .card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .card-header { 
            background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%); 
            color: white; 
            border-radius: 20px 20px 0 0 !important;
            padding: 20px;
        }
        .form-label { font-weight: 600; color: #4b5563; }
        .form-control, .form-select { padding: 12px; border-radius: 10px; border: 1px solid #d1d5db; }
        .form-control:focus, .form-select:focus { border-color: #1e3a8a; box-shadow: 0 0 0 0.25rem rgba(30, 58, 138, 0.1); }
        .btn-submit { background-color: #1e3a8a; border: none; padding: 12px; border-radius: 10px; font-weight: 600; transition: 0.3s; }
        .btn-submit:hover { background-color: #172554; transform: translateY(-2px); }
        .back-link { text-decoration: none; color: #6b7280; transition: 0.3s; }
        .back-link:hover { color: #1e3a8a; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h2 class="h4 mb-0"><i class="fas fa-school me-2"></i> Ajouter une Classe</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-8">
                                <label class="form-label">Nom de la classe</label>
                                <input type="text" name="nom_classe" class="form-control" placeholder="ex: L1 Informatique" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Code</label>
                                <input type="text" name="code_classe" class="form-control" placeholder="ex: L1-INFO" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label"><i class="fas fa-graduation-cap me-2 text-primary"></i>Filière :</label>
                            <select name="filiere_id" class="form-select" required>
                                <option value="" disabled selected>-- Choisir une filière --</option>
                                @foreach($filieres as $f)
                                    <option value="{{ $f->id }}">{{ $f->nom_filiere }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label class="form-label"><i class="fas fa-layer-group me-2 text-primary"></i>Niveau :</label>
                            <select name="niveau_id" class="form-select" required>
                                <option value="" disabled selected>-- Choisir un niveau --</option>
                                @foreach($niveaux as $n)
                                    <option value="{{ $n->id }}">{{ $n->nom_niveaux }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-submit text-white shadow-sm">
                                <i class="fas fa-save me-2"></i> Enregistrer la Classe
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4 border-top pt-3">
                        <a href="{{ url('/') }}" class="back-link">
                            <i class="fas fa-arrow-left me-1"></i> Retour au menu principal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>