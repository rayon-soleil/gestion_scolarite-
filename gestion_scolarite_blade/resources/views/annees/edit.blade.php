<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Année Académique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; min-height: 100vh; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background-color: #1e3a8a; color: white; padding: 20px; text-align: center; }
        .btn-save { background-color: #1e3a8a; border: none; color: white; padding: 12px; border-radius: 8px; width: 100%; transition: 0.3s; }
        .btn-save:hover { background-color: #172554; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Modifier l'Année</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('annees.update', $annee->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Année Académique</label>
                            <input type="text" name="annee_ac" class="form-control form-control-lg" value="{{ $annee->annee_ac }}" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-save shadow-sm">
                                <i class="fas fa-save me-2"></i>Enregistrer les modifications
                            </button>
                            <a href="{{ route('annees.index') }}" class="btn btn-light border mt-2">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>