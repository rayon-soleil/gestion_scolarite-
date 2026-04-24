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
        Schema::create('niveaux', function (Blueprint $table) {
        $table->id();
        $table->string('nom_niveau');
        // Si parent_id est null, c'est un Niveau. S'il a un ID, c'est un Sous-niveau.
        $table->foreignId('parent_id')->nullable()->constrained('niveaux')->onDelete('cascade');
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveauxes');
    }
};
