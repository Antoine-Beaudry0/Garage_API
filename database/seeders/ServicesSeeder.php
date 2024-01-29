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
                'nom' => 'Oil Change',
                'tempsEstimé' => '30 minutes',
                'prixEstimé' => 19.99
            ])],
            ['data' => json_encode([
                'nom' => 'Tire Rotation',
                'tempsEstimé' => '20 minutes',
                'prixEstimé' => 29.99
            ])],
            ['data' => json_encode([
                'nom' => 'Brake Inspection',
                'tempsEstimé' => '45 minutes',
                'prixEstimé' => 39.99
            ])],
            ['data' => json_encode([
                'nom' => 'Battery Replacement',
                'tempsEstimé' => '15 minutes',
                'prixEstimé' => 89.99
            ])],
            ['data' => json_encode([
                'nom' => 'Engine Tune-up',
                'tempsEstimé' => '2 hours',
                'prixEstimé' => 199.99
            ])],
        ]);
    }
}
