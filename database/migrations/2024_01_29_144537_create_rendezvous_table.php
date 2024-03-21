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
        Schema::create('rendezVous', function (Blueprint $table) {
            $table->id();
            $table->json('services');
            $table->string('dateHeureDebut', 255);
            $table->string('dateHeureFin', 255);
            $table->string('commentaire', 255);
            $table->boolean('notificationEnvoye', 255);
            $table->string('id_Voiture', 255);
            $table->string('id_PageGarage', 255);
            $table->string('id_Statut', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezVous');
    }
};
