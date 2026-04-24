<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes | Gestion Scolaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .main-card { border: none; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden; }
        .table thead { background-color: #1e3a8a; color: white; }
        .btn-create { background-color: #1e3a8a; border: none; transition: 0.3s; padding: 10px 20px; border-radius: 8px; }
        .btn-create:hover { background-color: #172554; transform: scale(1.02); }
        .badge-code { background-color: #eff6ff; color: #1e3a8a; border: 1px solid #dbeafe; font-weight: 600; }
        .btn-action { padding: 5px 10px; font-size: 0.85rem; border-radius: 6px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark mb-0">
                    <i class="fas fa-chalkboard-teacher me-2 text-primary"></i> Liste des Classes
                </h2>
                <div class="d-flex gap-2">
                    <a href="{{ route('classes.create') }}" class="btn btn-primary btn-create text-white shadow-sm">
                        <i class="fas fa-plus-circle me-1"></i> Créer une classe
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-3">
                        <i class="fas fa-home"></i>
                    </a>
                </div>
            </div>

            <div class="card main-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3">Nom de la Classe</th>
                                    <th class="py-3">Code</th>
                                    <th class="py-3">Filière</th>
                                    <th class="py-3">Niveau</th>
                                    <th class="text-center py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($classes as $c)
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">{{ $c->nom_classe }}</td>
                                    <td><span class="badge badge-code">{{ $c->code_classe }}</span></td>
                                    <td><i class="fas fa-graduation-cap me-2 text-muted"></i>{{ $c->filiere->nom_filiere ?? 'N/A' }}</td>
                                    <td><i class="fas fa-layer-group me-2 text-muted"></i>{{ $c->niveau->nom_niveaux ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('classes.edit', $c->id) }}" class="btn btn-sm btn-outline-warning btn-action">
                                                <i class="fas fa-pen me-1"></i> Modifier
                                            </a>
                                            
                                            <form action="{{ route('classes.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-action">
                                                    <i class="fas fa-trash me-1"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <div class="mb-2"><i class="fas fa-folder-open fa-3x opacity-25"></i></div>
                                        Aucune classe n'a encore été créée. Utilisez le bouton "Créer une classe".
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-3 text-end">
                <span class="text-muted small">Nombre total de classes : <strong>{{ $classes->count() }}</strong></span>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>