<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            ['data' => 'Changement d\'huile', 'id_garage' => '1'],
            ['data' => 'Révision générale', 'id_garage' => '1'],
            ['data' => 'Réparation de système de freinage', 'id_garage' => '2'],
            ['data' => 'Service de climatisation', 'id_garage' => '2'],
            ['data' => 'Remplacement de pare-brise', 'id_garage' => '3'],
            ['data' => 'Réparation de carrosserie', 'id_garage' => '3'],
            ['data' => 'Installation d\'accessoires', 'id_garage' => '4'],
            ['data' => 'Diagnostic électronique', 'id_garage' => '4'],
            ['data' => 'Entretien de la batterie', 'id_garage' => '5'],
            ['data' => 'Contrôle technique', 'id_garage' => '5'],
        ];

        DB::table('services')->insert($services);
    }
}
