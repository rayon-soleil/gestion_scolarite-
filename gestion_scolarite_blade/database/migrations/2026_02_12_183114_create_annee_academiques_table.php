<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('annee_academiques', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Ex: 2025-2026
            $table->date('dateOuverture');
            $table->date('dateFermeture');
            $table->date('dateDebutInscription');
            $table->date('dateFinInscription');
            // Statuts : BROUILLON, PUBLIE, OUVERTURE_INSCRIPTION, FERMETURE_INSCRIPTION, CLOTURE
            $table->string('statut')->default('BROUILLON');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annee_academiques');
    }
};
