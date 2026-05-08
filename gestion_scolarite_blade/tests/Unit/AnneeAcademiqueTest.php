<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\AnneeAcademique;
use App\Service\AnneeAcademiqueService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Exception;

class AnneeAcademiqueTest extends TestCase
{
    use RefreshDatabase;

    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AnneeAcademiqueService();
    }

    /** 1. Test création réussie en BROUILLON */
    public function test_creation_annee_reussie_est_en_brouillon()
    {
        $data = [
            'code' => '2026-2027',
            'dateOuverture' => '2026-09-01',
            'dateFermeture' => '2027-06-01',
            'dateDebutInscription' => '2026-08-01',
            'dateFinInscription' => '2026-08-31',
        ];

        $annee = $this->service->createAnnee($data);

        $this->assertEquals('BROUILLON', $annee->statut);
        $this->assertDatabaseHas('annee_academiques', ['code' => '2026-2027']);
    }

    /** 2. Exception si on tente de publier */
    public function test_publication_impossible_si_regle_non_respectee()
    {
        $annee = AnneeAcademique::factory()->create(['statut' => 'BROUILLON']);

        $this->expectException(Exception::class);
        $this->service->publierAnnee($annee);
    }

    /** 3. Test de la durée de 9 mois */
    public function test_annee_doit_faire_exactement_9_mois()
    {
        $data = [
            'code' => '2028-2029',
            'dateOuverture' => '2028-09-01',
            'dateFermeture' => '2029-06-01',
            'dateDebutInscription' => '2028-08-01',
            'dateFinInscription' => '2028-08-31',
        ];

        $annee = $this->service->createAnnee($data);

        $debut = \Carbon\Carbon::parse($annee->dateOuverture);
        $fin = \Carbon\Carbon::parse($annee->dateFermeture);

        $this->assertEquals(9, $debut->diffInMonths($fin));
    }

    /** 4. Échec si moins de 9 mois */
    public function test_creation_echoue_si_moins_de_9_mois()
    {
        $data = [
            'code' => '2029-2030',
            'dateOuverture' => '2029-09-01',
            'dateFermeture' => '2029-12-01',
            'dateDebutInscription' => '2029-08-01',
            'dateFinInscription' => '2029-08-31',
        ];

        $this->expectException(Exception::class);
        $this->service->createAnnee($data);
    }

    /** 5. Créer une année existante (Doublon) */
    public function test_creation_annee_existante_doit_echouer()
    {
        AnneeAcademique::create([
            'code' => '2026-2027',
            'dateOuverture' => '2026-09-01',
            'dateFermeture' => '2027-06-01',
            'dateDebutInscription' => '2026-08-01',
            'dateFinInscription' => '2026-08-31',
            'statut' => 'BROUILLON'
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        $this->service->createAnnee([
            'code' => '2026-2027',
            'dateOuverture' => '2026-09-01',
            'dateFermeture' => '2027-06-01',
            'dateDebutInscription' => '2026-08-01',
            'dateFinInscription' => '2026-08-31',
        ]);
    }
}
