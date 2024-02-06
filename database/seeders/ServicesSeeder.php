<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            ['data' => json_encode([
                'id_service' => 1,
                'nom' => 'Oil Change',
                'tempsEstimé' => '30 minutes',
                'prixEstimé' => 19.99,
                'id_page' => 1,
                'id_serviceRdv' => 1
            ])],
            ['data' => json_encode([
                'id_service' => 2,
                'nom' => 'Tire Rotation',
                'tempsEstimé' => '20 minutes',
                'prixEstimé' => 29.99,
                'id_page' => 2,
                'id_serviceRdv' => 2
            ])],
            ['data' => json_encode([
                'id_service' => 3,
                'nom' => 'Brake Inspection',
                'tempsEstimé' => '45 minutes',
                'prixEstimé' => 39.99,
                'id_page' => 3,
                'id_serviceRdv' => 3
            ])],
            ['data' => json_encode([
                'id_service' => 4,
                'nom' => 'Battery Replacement',
                'tempsEstimé' => '15 minutes',
                'prixEstimé' => 89.99,
                'id_page' => 4,
                'id_serviceRdv' => 4
            ])],
            ['data' => json_encode([
                'id_service' => 5,
                'nom' => 'Engine Tune-up',
                'tempsEstimé' => '2 hours',
                'prixEstimé' => 199.99,
                'id_page' => 5,
                'id_serviceRdv' => 5
            ])],
            // Ajoutez plus d'entrées selon le besoin
        ]);
    }
}
