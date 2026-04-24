<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tarifs | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .main-card { border: none; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden; }
        .table thead { background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%); color: white; }
        .btn-add { background-color: #1e3a8a; border: none; transition: 0.3s; padding: 10px 20px; border-radius: 8px; }
        .btn-add:hover { background-color: #172554; transform: scale(1.02); }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">
            <i class="fas fa-money-bill-wave me-2 text-primary"></i> Gestion des Tarifs
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('tarifs.create') }}" class="btn btn-primary btn-add text-white shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Nouveau Tarif
            </a>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-3">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card main-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3">Classe</th>
                            <th class="py-3">Inscription</th>
                            <th class="py-3">Mensualité</th>
                            <th class="text-center py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tarifs as $t)
                        <tr>
                            <td class="ps-4 fw-bold text-dark">
                                <i class="fas fa-graduation-cap me-2 text-muted"></i>{{ $t->classe->nom_classe }}
                            </td>
                            <td class="fw-semibold">{{ number_format($t->inscription, 0, ',', ' ') }} FCFA</td>
                            <td class="fw-semibold">{{ number_format($t->mensualite, 0, ',', ' ') }} FCFA</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('tarifs.edit', $t->id) }}" class="btn btn-sm btn-outline-primary px-3 rounded-pill">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('tarifs.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Supprimer ce tarif ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-3 rounded-pill">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-info-circle me-2"></i> Aucun tarif enregistré.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
