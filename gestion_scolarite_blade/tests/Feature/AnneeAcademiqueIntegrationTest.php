<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\AnneeAcademique;

class AnneeAcademiqueIntegrationTest extends TestCase
{
    use RefreshDatabase; // Indispensable pour repartir d'une base propre à chaque test

    /** 1. Test d'intégration : Cas où la création complète marche */
    public function test_integration_creation_annee_complete_marche()
    {
        // On simule l'envoi du formulaire avec toutes les données requises
        $response = $this->post(route('annees.store'), [
            'code' => '2026-2027',
            'dateOuverture' => '2026-09-01',
            'dateFermeture' => '2027-06-01',
            'dateDebutInscription' => '2026-08-01',
            'dateFinInscription' => '2026-08-31',
        ]);

        // Vérifie qu'on est redirigé vers la liste (index)
        $response->assertRedirect(route('annees.index'));

        // Vérifie que l'année est réellement enregistrée en base avec le bon statut
        $this->assertDatabaseHas('annee_academiques', [
            'code' => '2026-2027',
            'statut' => 'BROUILLON'
        ]);
    }

    /** 2. Test d'intégration : Données cohérentes mais durée < 9 mois */
    public function test_integration_erreur_si_moins_de_9_mois()
    {
        $response = $this->post(route('annees.store'), [
            'code' => '2027-2028',
            'dateOuverture' => '2027-09-01',
            'dateFermeture' => '2027-11-01', // Seulement 2 mois : Invalide !
            'dateDebutInscription' => '2027-08-01',
            'dateFinInscription' => '2027-08-15',
        ]);

        // Vérifie que le contrôleur nous renvoie en arrière avec une erreur en session
        $response->assertSessionHas('error');

        // Vérifie qu'aucune ligne n'a été insérée par erreur
        $this->assertDatabaseCount('annee_academiques', 0);
    }

    /** 3. Test d'intégration : Création d'une année qui existe déjà (Doublon) */
    public function test_integration_creation_doublon_echoue()
    {
        // On pré-insère une année
        AnneeAcademique::create([
            'code' => '2026-2027',
            'dateOuverture' => '2026-09-01',
            'dateFermeture' => '2027-06-01',
            'dateDebutInscription' => '2026-08-01',
            'dateFinInscription' => '2026-08-31',
            'statut' => 'BROUILLON'
        ]);

        // On tente de soumettre exactement la même via le formulaire
        $response = $this->post(route('annees.store'), [
            'code' => '2026-2027',
            'dateOuverture' => '2026-09-01',
            'dateFermeture' => '2027-06-01',
            'dateDebutInscription' => '2026-08-01',
            'dateFinInscription' => '2026-08-31',
        ]);

        // On vérifie que le système attrape l'erreur de doublon et renvoie une erreur
        $response->assertSessionHas('error');
    }
}
