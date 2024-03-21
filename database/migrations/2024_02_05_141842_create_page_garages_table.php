<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('page_garages', function (Blueprint $table) {
            $table->id();
            $table->json('horaires');
            $table->string('nom');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('image')->nullable();
            $table->string('id_garagiste');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_garages');
    }
};
