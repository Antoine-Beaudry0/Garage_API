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
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->string('dateHeureDebut', 255);
            $table->string('dateHeureFin', 255);
            $table->string('commentaire', 255);
            $table->boolean('notificationEnvoyé', 255);
            $table->string('id_Client', 255);
            $table->string('id_Garagiste', 255);
            $table->string('id_Service', 255);
            $table->string('id_Statut', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};
