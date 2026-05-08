<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnneeAcademiqueFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->year() . '-' . ($this->faker->year() + 1),
            'dateOuverture' => '2026-09-01',
            'dateFermeture' => '2027-06-01',
            'dateDebutInscription' => '2026-08-01', // Important pour éviter l'erreur NOT NULL
            'dateFinInscription' => '2026-08-30',
            'statut' => 'BROUILLON', // Valeur par défaut demandée
        ];
    }
}
