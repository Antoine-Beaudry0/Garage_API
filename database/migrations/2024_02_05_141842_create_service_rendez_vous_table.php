<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('service_rendez_vous', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rdv');
            $table->unsignedBigInteger('id_service');
            // Optionally, define foreign keys if `id_rdv` and `id_service` reference other tables
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_rendez_vous');
    }
};
