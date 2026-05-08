@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Gestion des Années Académiques</h1>
        <a href="{{ route('annees.create') }}" class="btn btn-primary">
            + Nouvelle Année
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="table min-w-full">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                    <th class="py-3 px-6 text-left">Code</th>
                    <th class="py-3 px-6 text-left">Ouverture</th>
                    <th class="py-3 px-6 text-left">Fermeture</th>
                    <th class="py-3 px-6 text-center">Statut</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($annees as $annee)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $annee->code }}</td>
                    <td class="py-3 px-6 text-left">{{ $annee->dateOuverture }}</td>
                    <td class="py-3 px-6 text-left">{{ $annee->dateFermeture }}</td>
                    <td class="py-3 px-6 text-center">
                        <span class="badge {{ $annee->statut == 'OUVERT' ? 'bg-success' : 'bg-warning' }}">
                            {{ $annee->statut }}
                        </span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{-- Tes boutons d'actions ici --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Aucune année trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
