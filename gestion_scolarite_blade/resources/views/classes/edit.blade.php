<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Classe | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; min-height: 100vh; }
        .card { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%); color: white; padding: 20px; }
        .input-group-text { background-color: #f1f5f9; border-right: none; }
        .form-control, .form-select { border-left: none; height: 45px; }
        .form-control:focus, .form-select:focus { box-shadow: none; border-color: #dee2e6; }
        .btn-update { background-color: #1e3a8a; border: none; color: white; font-weight: 600; padding: 12px; border-radius: 10px; transition: 0.3s; }
        .btn-update:hover { background-color: #172554; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Modifier la Classe</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('classes.update', $classe->id) }}" method="POST">
                        @csrf 
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nom de la Classe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-chalkboard text-primary"></i></span>
                                <input type="text" name="nom_classe" class="form-control" value="{{ $classe->nom_classe }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Filière associée</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-book text-primary"></i></span>
                                <select name="filiere_id" class="form-select">
                                    @foreach($filieres as $f)
                                        <option value="{{ $f->id }}" {{ $classe->filiere_id == $f->id ? 'selected' : '' }}>
                                            {{ $f->nom_filiere }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-update">
                                <i class="fas fa-save me-2"></i>Mettre à jour la classe
                            </button>
                            <a href="{{ route('classes.index') }}" class="btn btn-light border text-muted">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>