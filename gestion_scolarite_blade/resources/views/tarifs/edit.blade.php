<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Tarif | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; min-height: 100vh; }
        .card { border-radius: 20px; border: none; box-shadow: 0 15px 35px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%); color: white; padding: 25px; border: none; }
        .input-group-text { background-color: #f8fafc; border-right: none; color: #1e3a8a; border-radius: 12px 0 0 12px; }
        .form-control, .form-select { border-left: none; height: 50px; border-radius: 0 12px 12px 0; }
        .form-control:focus, .form-select:focus { box-shadow: none; border-color: #dee2e6; }
        .btn-update { background-color: #1e3a8a; border: none; color: white; padding: 14px; border-radius: 12px; font-weight: 600; transition: 0.3s; }
        .btn-update:hover { background-color: #172554; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3); }
        label { font-weight: 600; color: #475569; margin-bottom: 8px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i>Modifier le Tarif</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('tarifs.update', $tarif->id) }}" method="POST">
                        @csrf 
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Montant de l'inscription (FCFA)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                <input type="number" name="montant" class="form-control" value="{{ $tarif->montant }}" required placeholder="Ex: 50000">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Classe concernée</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-school"></i></span>
                                <select name="classe_id" class="form-select" required>
                                    @foreach($classes as $cl)
                                        <option value="{{ $cl->id }}" {{ $tarif->classe_id == $cl->id ? 'selected' : '' }}>
                                            {{ $cl->nom_classe }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-update">
                                <i class="fas fa-sync-alt me-2"></i>Mettre à jour le tarif
                            </button>
                            <a href="{{ route('tarifs.index') }}" class="btn btn-light border text-muted py-2">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>