@extends('layouts.app')

@section('title', 'Années Académiques')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="fas fa-calendar-alt text-primary me-2"></i> Années Académiques</h2>

        {{-- MODIFICATION : Le bouton pointe maintenant vers la route de création --}}
        <a href="{{ route('annees.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Nouvelle Année
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card card-table overflow-hidden">
        <table class="table table-hover align-middle mb-0">
            <thead class="thead-custom">
                <tr>
                    <th class="ps-4">Code</th>
                    <th>Période Scolaire</th>
                    <th>Inscriptions</th>
                    <th>Statut</th>
                    <th class="text-center">Cycle</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($annees as $a)
                <tr>
                    <td class="ps-4 fw-bold text-primary">{{ $a->code }}</td>
                    <td>{{ $a->dateOuverture }} à {{ $a->dateFermeture }}</td>
                    <td><small>Début: {{ $a->dateDebutInscription }}<br>Fin: {{ $a->dateFinInscription }}</small></td>
                    <td><span class="badge bg-secondary rounded-pill">{{ $a->statut }}</span></td>

                    <td class="text-center">
                        @if($a->statut == 'BROUILLON')
                            <a href="{{ route('annees.statut', [$a->id, 'PUBLIE']) }}" class="btn btn-sm btn-outline-info">Publier</a>
                        @endif
                    </td>

                    <td class="text-center">
                        @if($a->statut == 'BROUILLON')
                            <div class="d-flex justify-content-center">
                                {{-- Bouton Modifier --}}
                                <button class="btn btn-sm text-primary me-2" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $a->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                {{-- Bouton Supprimer --}}
                                <form action="{{ route('annees.destroy', $a->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm text-danger" onclick="return confirm('Supprimer ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                            {{-- Modal de modification (on garde le modal ici car c'est pratique pour l'édit rapide) --}}
                            <div class="modal fade" id="modalEdit{{ $a->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ route('annees.update', $a->id) }}" method="POST" class="modal-content text-start text-dark">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier {{ $a->code }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 text-start">
                                                <label class="form-label fw-bold">Code</label>
                                                <input type="text" name="code" class="form-control" value="{{ $a->code }}" required>
                                            </div>
                                            <div class="row text-start">
                                                <div class="col-6"><label class="small fw-bold">Ouverture</label><input type="date" name="dateOuverture" class="form-control" value="{{ $a->dateOuverture }}"></div>
                                                <div class="col-6"><label class="small fw-bold">Fermeture</label><input type="date" name="dateFermeture" class="form-control" value="{{ $a->dateFermeture }}"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary rounded-pill">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <i class="fas fa-lock text-muted" title="Année verrouillée"></i>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted"><i class="fas fa-folder-open fa-2x mb-2 d-block"></i> Aucune donnée trouvée</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
