<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Niveau | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; min-height: 100vh; }
        .card { border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%); color: white; padding: 25px; }
        .input-group-text { background-color: #f8fafc; border-right: none; color: #1e3a8a; }
        .form-control, .form-select { border-left: none; height: 50px; border-radius: 0 10px 10px 0; }
        .form-control:focus, .form-select:focus { box-shadow: none; border-color: #dee2e6; }
        .btn-update { background-color: #1e3a8a; border: none; color: white; padding: 12px; border-radius: 10px; font-weight: 600; transition: 0.3s; }
        .btn-update:hover { background-color: #172554; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0"><i class="fas fa-layer-group me-2"></i>Modifier le Niveau</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('niveaux.update', $niveau->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Nom du Niveau</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                <input type="text" name="nom_niveau" class="form-control" value="{{ $niveau->nom_niveau }}" required placeholder="Ex: Première Année">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Catégorie / Cycle</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                <select name="categorie_niveaux_id" class="form-select" required>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $niveau->categorie_niveaux_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->categories_niveau }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-update">
                                <i class="fas fa-save me-2"></i>Enregistrer les modifications
                            </button>
                            <a href="{{ route('niveaux.index') }}" class="btn btn-light border text-muted">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
