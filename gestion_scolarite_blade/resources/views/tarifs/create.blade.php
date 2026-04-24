<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurer un Tarif | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Palette de couleur Bleu Foncé / Marine */
        :root {
            --dark-blue: #1e3a8a; /* Bleu Marine profond */
            --midnight: #172554;  /* Bleu nuit pour le survol */
            --accent-blue: #3b82f6;
        }

        body { background-color: #f1f5f9; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; min-height: 100vh; padding: 20px 0; }
        .card { border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 550px; margin: auto; }
        
        /* Couleur des icônes changée en bleu foncé */
        .input-group-text { background-color: #f8fafc; border-right: none; color: var(--dark-blue); width: 45px; justify-content: center; }
        
        .form-control, .form-select { border-left: none; height: 50px; }
        .form-control:focus, .form-select:focus { box-shadow: none; border-color: var(--dark-blue); }
        
        /* Bouton Enregistrer en bleu foncé */
        .btn-save { background-color: var(--dark-blue); border: none; color: white; font-weight: 600; padding: 14px; border-radius: 30px; transition: 0.3s; margin-top: 10px; }
        .btn-save:hover { background-color: var(--midnight); transform: translateY(-2px); box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3); }
        
        .btn-cancel { background-color: #fff; border: 1px solid #dee2e6; color: #64748b; border-radius: 30px; padding: 12px; transition: 0.2s; }
        .btn-cancel:hover { background-color: #f8fafc; color: #1e293b; }
        
        /* Titre en bleu foncé */
        .text-dark-blue { color: var(--dark-blue); }
        label { font-weight: 600; margin-bottom: 8px; color: #334155; font-size: 0.95rem; }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4 p-md-5">
        <div class="text-center mb-4">
            <h4 class="text-dark-blue fw-bold">
                <i class="fas fa-plus-circle me-2"></i> Configurer un Tarif
            </h4>
        </div>

        {{-- FORMULAIRE --}}
        <form action="{{ route('tarifs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Sélectionner la Classe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-school"></i></span>
                    <select name="classe_id" class="form-select" required>
                        <option value="" selected disabled>-- Choisir une classe --</option>
                        @foreach($classes as $cl)
                            <option value="{{ $cl->id }}">{{ $cl->nom_classe }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label>Montant Inscription</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-coins"></i></span>
                    <input type="number" name="montant_inscription" class="form-control" placeholder="Ex: 50000" required>
                    <span class="input-group-text bg-light border-start text-muted fw-bold" style="width: auto; padding: 0 15px;">FCFA</span>
                </div>
            </div>

            <div class="mb-4">
                <label>Montant Mensualité</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    <input type="number" name="montant_mensualite" class="form-control" placeholder="Ex: 25000" required>
                    <span class="input-group-text bg-light border-start text-muted fw-bold" style="width: auto; padding: 0 15px;">FCFA</span>
                </div>
            </div>

            <div class="d-grid gap-3">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-check-circle me-2"></i> Enregistrer le Tarif
                </button>
                <a href="{{ route('tarifs.index') }}" class="btn btn-cancel text-center text-decoration-none">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>