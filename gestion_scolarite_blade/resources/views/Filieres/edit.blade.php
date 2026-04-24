<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Filière | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; min-height: 100vh; padding: 20px 0; }
        .card { border-radius: 20px; border: none; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 100%; max-width: 550px; margin: auto; overflow: hidden; }
        .card-header { background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%); color: white; padding: 25px; border: none; }
        .input-group-text { background-color: #f1f5f9; border-right: none; color: #1e3a8a; width: 50px; justify-content: center; }
        .form-control { border-left: none; height: 50px; border-radius: 0 12px 12px 0; }
        .form-control:focus { box-shadow: none; border-color: #dee2e6; }
        .btn-update { background-color: #1e3a8a; border: none; color: white; padding: 14px; border-radius: 30px; font-weight: 600; transition: 0.3s; margin-top: 15px; }
        .btn-update:hover { background-color: #172554; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3); }
        .btn-cancel { background-color: transparent; border: 1px solid #dee2e6; color: #6c757d; border-radius: 30px; padding: 12px; transition: 0.2s; text-decoration: none; display: block; text-align: center; }
        label { font-weight: 600; color: #475569; margin-bottom: 8px; font-size: 0.9rem; }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Modifier la Filière</h4>
        </div>

        <div class="card-body p-4 p-md-5">
            {{-- Utilisation de la variable $filiere qui correspond à ton contrôleur --}}
            <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
                @csrf 
                @method('PUT')

                <div class="mb-3">
                    <label>Code de la Filière</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        <input type="text" name="code_filiere" class="form-control" value="{{ $filiere->code_filiere }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label>Nom de la Filière</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                        <input type="text" name="nom_filiere" class="form-control" value="{{ $filiere->nom_filiere }}" required>
                    </div>
                </div>

                <div class="d-grid gap-3">
                    <button type="submit" class="btn btn-update">
                        <i class="fas fa-sync-alt me-2"></i>Mettre à jour la filière
                    </button>
                    <a href="{{ route('filieres.index') }}" class="btn btn-cancel">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>