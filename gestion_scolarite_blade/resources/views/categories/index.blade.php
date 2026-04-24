<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; padding-top: 50px; }
        
        /* Style de la carte principale */
        .table-card { 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            border: none;
            overflow: hidden;
        }

        /* En-tête du tableau */
        .table thead { 
            background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%); 
            color: white; 
        }
        .table thead th { border: none; padding: 15px; font-weight: 500; }

        /* Bouton Ajouter */
        .btn-add { 
            background-color: #1e3a8a; 
            border: none; 
            transition: 0.3s; 
            border-radius: 10px;
            font-weight: 600;
        }
        .btn-add:hover { 
            background-color: #172554; 
            transform: translateY(-2px); 
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.2);
        }

        /* Badges et boutons d'action */
        .id-badge { background-color: #f1f5f9; color: #64748b; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; }
        .btn-action { border-radius: 8px !important; transition: 0.2s; margin: 0 2px; }
        .btn-action:hover { transform: scale(1.05); }
        
        .back-link { text-decoration: none; color: #64748b; font-weight: 500; transition: 0.3s; }
        .back-link:hover { color: #1e3a8a; }
    </style>
</head>
<body>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            
            {{-- Affichage du message de succès si il existe --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 10px;">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Liste des Catégories</h2>
                    <p class="text-muted small mb-0">Gérez les cycles et types de niveaux d'enseignement</p>
                </div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-add px-4 py-2 text-white">
                    <i class="fas fa-plus-circle me-2"></i> Ajouter Nouveau
                </a>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width: 15%">ID</th>
                                <th style="width: 50%">Désignation</th>
                                <th style="width: 35%" class="text-center">Actions de Gestion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $cat)
                            <tr>
                                <td class="ps-4">
                                    <span class="id-badge">#{{ $cat->id }}</span>
                                </td>
                                <td>
                                    {{-- Correction ici : categories_niveau (sans x à la fin) pour correspondre à ta base --}}
                                    <div class="fw-bold text-dark">{{ $cat->categories_niveau }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-outline-warning btn-sm btn-action">
                                            <i class="fas fa-pen me-1"></i> Modifier
                                        </a>

                                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')" class="ms-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm btn-action">
                                                <i class="fas fa-trash me-1"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-folder-open fa-3x mb-3 opacity-20"></i><br>
                                        <i>Aucune donnée enregistrée pour le moment.</i>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ url('/') }}" class="back-link">
                    <i class="fas fa-arrow-left me-2"></i> Retour au tableau de bord
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>